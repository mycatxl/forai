<?php
declare (strict_types=1);

namespace App\Plugin\TokenPay\Handle;

use Kernel\Exception\HandleException;
use Kernel\Exception\JSONException;
use Kernel\Util\Http;

class Pay extends \Kernel\Plugin\Abstract\Pay
{
    public function create(): \Kernel\Plugin\Entity\Pay
    {
        if (empty($this->config['apiUrl'])) {
            throw new JSONException("请配置TokenPay网关地址");
        }

        if (empty($this->config['apiKey'])) {
            throw new JSONException("请配置TokenPay密钥");
        }

        // 构建参数
        $param = [
            'OutOrderId' => $this->order->trade_no,
            'OrderUserKey' => $this->order->trade_no,
            'ActualAmount' => number_format($this->amount, 2, '.', ''),
            'Currency' => $this->code ?? 'TRX',
            'NotifyUrl' => $this->asyncUrl,
            'RedirectUrl' => $this->syncUrl
        ];

        // 生成签名
        ksort($param);
        $signStr = '';
        foreach ($param as $k => $v) {
            if (!empty($v)) {
                $signStr .= "&{$k}={$v}";
            }
        }
        $signStr = ltrim($signStr, '&');
        $param['Signature'] = md5($signStr . $this->config['apiKey']);

        $url = rtrim($this->config['apiUrl'], '/') . '/api/CreateOrder';

        try {
            // 使用与易支付相同的请求方式
            $response = Http::make()->post($url, [
                'json' => $param,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ]
            ]);

            $result = json_decode($response->getBody()->getContents(), true);

            if (empty($result) || !isset($result['success'])) {
                throw new HandleException("支付接口返回数据格式错误");
            }

            if (!$result['success']) {
                throw new HandleException($result['message'] ?? "创建订单失败");
            }

            if (empty($result['data'])) {
                throw new HandleException("支付URL为空");
            }

            $pay = new \Kernel\Plugin\Entity\Pay();
            $pay->setType(\Kernel\Plugin\Const\Pay::TYPE_REDIRECT);
            $pay->setPayUrl($result['data']);
            $pay->setTimeout(300);

            return $pay;

        } catch (\Throwable $e) {
            $this->plugin->log("TokenPay请求出错：" . $e->getMessage(), true);
            throw new JSONException("支付接口出错，请查看插件日志");
        }
    }

    public function notify($params): array
    {
        try {
            $data = $_POST;
            
            // 验证签名
            if (!isset($data['Signature']) || !$this->verifySign($data)) {
                throw new JSONException("签名验证失败");
            }

            // 验证订单号
            if (empty($data['OutOrderId']) || $data['OutOrderId'] != $this->order->trade_no) {
                throw new JSONException("订单号不匹配");
            }

            // 验证金额
            if (empty($data['ActualAmount']) || $data['ActualAmount'] != $this->amount) {
                throw new JSONException("金额不匹配");
            }

            // 验证状态
            if (empty($data['Status']) || $data['Status'] !== 'Completed') {
                throw new JSONException("订单未支付完成");
            }

            return [
                'trade_no' => $data['OutOrderId'],
                'out_trade_no' => $data['TransactionId'] ?? '',
                'total_amount' => $data['ActualAmount'],
                'status' => true
            ];

        } catch (\Exception $e) {
            $this->plugin->log("TokenPay回调处理出错：" . $e->getMessage(), true);
            return ['status' => false];
        }
    }

    private function verifySign(array $data): bool
    {
        $sign = $data['Signature'];
        unset($data['Signature']);
        
        ksort($data);
        $signStr = '';
        foreach ($data as $k => $v) {
            if (!empty($v)) {
                $signStr .= "&{$k}={$v}";
            }
        }
        $signStr = ltrim($signStr, '&');
        
        return md5($signStr . $this->config['apiKey']) === $sign;
    }
}