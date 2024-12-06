<?php
declare (strict_types=1);

namespace App\Plugin\Epay\Handle;

use Kernel\Context\Interface\Response;
use Kernel\Exception\HandleException;
use Kernel\Exception\JSONException;
use Kernel\Util\Http;
use Kernel\Util\UserAgent;

class Pay extends \Kernel\Plugin\Abstract\Pay
{


    /**
     * @return \Kernel\Plugin\Entity\Pay
     * @throws HandleException
     * @throws JSONException
     * @throws \ReflectionException
     */
    public function create(): \Kernel\Plugin\Entity\Pay
    {
        if (!$this->config['url']) {
            throw new JSONException("请配置支付网关地址");
        }

        if (!$this->config['pid']) {
            throw new JSONException("请配置商户ID");
        }

        $param = [
            'pid' => $this->config['pid'],
            'name' => "商品购买-订单号:" . $this->order->trade_no,
            'type' => $this->code,
            'money' => $this->amount,
            'out_trade_no' => $this->order->trade_no,
            'notify_url' => $this->asyncUrl,
            'return_url' => $this->syncUrl,
            'sitename' => $this->order->trade_no,
            'clientip' => $this->clientIp,
            'device' => UserAgent::isMobile($this->request->header("UserAgent")) ? 'mobile' : 'pc'
        ];

        $url = trim($this->config['url'], "/");

        if ($this->config['version'] == 1) {
            $param['method'] = 'jump';
            $param['timestamp'] = time();
            $param['sign'] = $this->rsa($param, $this->config['private_key']);
            $param['sign_type'] = "RSA";

            if ($this->config['mapi'] == 1) {
                $url = $url . "/api/pay/create";
            } else {
                $url = $url . "/api/pay/submit";
            }
            $code = 0;

        } else {
            $param['sign'] = $this->md5($param, $this->config['key']);
            $param['sign_type'] = "MD5";

            if ($this->config['mapi'] == 1) {
                $url = $url . "/mapi.php";
            } else {
                $url = $url . "/submit.php";
            }

            $code = 1;
        }

        $pay = new \Kernel\Plugin\Entity\Pay();
        $pay->setTimeout(300);

        $types = [
            'alipay' => \Kernel\Plugin\Const\Pay::RENDER_COMMON_ALIPAY_VIEW,
            'wxpay' => \Kernel\Plugin\Const\Pay::RENDER_COMMON_WECHAT_VIEW,
            'qqpay' => \Kernel\Plugin\Const\Pay::RENDER_COMMON_QQ_VIEW
        ];

        $this->plugin->log("下单金额：{$this->amount}");

        if ($this->config['mapi'] == 1) {
            try {
                $response = Http::make()->post($url, [
                    "form_params" => $param
                ]);
                $json = json_decode($response->getBody()->getContents() ?: "", true) ?: [];

                if (!isset($json['code'])) {
                    throw new HandleException("下单失败#0");
                }

                if ($json['code'] != $code) {
                    throw new HandleException($json['msg'] ?? "下单失败#1");
                }

                if ($this->config['version'] == 1) {
                    if (!isset($json['pay_info'])) {
                        throw new HandleException("下单失败#2");
                    }

                    $pay->setPayUrl($json['pay_info']);
                    $pay->setRenderMode(\Kernel\Plugin\Const\Pay::RENDER_JUMP);
                    return $pay;
                } else {
                    if (isset($json['qrcode'])) {
                        $pay->setPayUrl($json['qrcode']);
                        $pay->setRenderMode($types[$this->code]);
                        return $pay;
                    } elseif (isset($json['payurl'])) {
                        $pay->setPayUrl($json['payurl']);
                        $pay->setRenderMode(\Kernel\Plugin\Const\Pay::RENDER_JUMP);
                        return $pay;
                    }
                }
            } catch (\Throwable $e) {
                $this->plugin->log("商户ID：{$this->config['pid']}，MAPI请求出错：" . $e->getMessage(), true);
                throw new JSONException("支付接口出错，请查看插件日志");
            }
        }

        $pay->setPayUrl($url);
        $pay->setRenderMode(\Kernel\Plugin\Const\Pay::RENDER_FORM_POST_SUBMIT);
        $pay->setOption($param);
        return $pay;
    }


    /**
     * @return Response
     * @throws JSONException
     * @throws \ReflectionException
     */
    public function async(): Response
    {
        $data = (array)(empty($this->request->post()) ? $this->request->get() : $this->request->post());

        if (!isset($data['sign']) || !$this->verification($data)) {
            throw new JSONException("签名错误");
        }

        $this->plugin->log("回调金额：{$this->amount}，第三方金额：{$data['money']}");
        $this->plugin->log($data);

        if ($this->code != $data['type']) {
            throw new JSONException("支付类型错误");
        }

        if ($this->order->trade_no != $data['out_trade_no']) {
            throw new JSONException("订单号错误");
        }

        if ($this->amount != $data['money']) {
            throw new JSONException("金额不正确");
        }

        if ($data['trade_status'] != "TRADE_SUCCESS") {
            throw new JSONException("订单未支付");
        }

        $this->successful();
        return $this->response->raw("success");
    }


    /**
     * @param array $data
     * @return bool
     */
    private function verification(array $data): bool
    {
        $sign = $data['sign'];
        unset($data['sign']);
        unset($data['sign_type']);

        if ($this->config['version'] == 1) {
            return $this->rsaVerify($data, $sign, $this->config['platform_public_key']);
        } else {
            if ($sign == $this->md5($data, $this->config['key'])) {
                return true;
            }
        }

        return false;
    }


    /**
     * @param array $data
     * @param string $key
     * @return string
     */
    private function md5(array $data, string $key): string
    {
        ksort($data);
        $sign = '';
        foreach ($data as $k => $v) {
            $sign .= $k . '=' . $v . '&';
        }
        $sign = trim($sign, '&');

        return md5($sign . $key);
    }


    /**
     * @param array $param
     * @param string $key
     * @return string
     * @throws HandleException
     */
    private function rsa(array $param, string $key): string
    {
        $data = $this->getStr($param);
        $private_key = "-----BEGIN PRIVATE KEY-----\n" .
            wordwrap($key, 64, "\n", true) .
            "\n-----END PRIVATE KEY-----";
        $privateKey = openssl_get_privatekey($private_key);
        if (!$privateKey) {
            throw new HandleException('签名失败，商户私钥错误');
        }
        openssl_sign($data, $sign, $privateKey, OPENSSL_ALGO_SHA256);
        return base64_encode($sign);
    }


    /**
     * @param array $params
     * @param string $sign
     * @param string $publicKey
     * @return bool
     */
    public function rsaVerify(array $params, string $sign, string $publicKey): bool
    {
        if (empty($params['timestamp']) || abs(time() - $params['timestamp']) > 300) {
            return false;
        }
        $str = $this->getStr($params);
        $key = "-----BEGIN PUBLIC KEY-----\n" .
            wordwrap($publicKey, 64, "\n", true) .
            "\n-----END PUBLIC KEY-----";
        $publicKey = openssl_get_publickey($key);
        if (!$publicKey) {
            return false;
        }
        $result = openssl_verify($str, base64_decode($sign), $publicKey, OPENSSL_ALGO_SHA256);

        if ($result == 1) {
            return true;
        }
        return false;
    }

    /**
     * @param array $param
     * @return string
     */
    private function getStr(array $param): string
    {
        ksort($param);
        $str = '';
        foreach ($param as $k => $v) {
            if (empty($v) || is_array($v) || $k == 'sign' || $k == 'sign_type') {
                continue;
            }
            $str .= '&' . $k . '=' . $v;
        }
        return substr($str, 1);
    }
}