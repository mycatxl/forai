<?php
declare(strict_types=1);

use Kernel\Plugin\Const\Plugin;

return [
    Plugin::NAME => 'TokenPay',
    Plugin::AUTHOR => 'TokenPay',
    Plugin::DESCRIPTION => 'TokenPay加密货币支付解决方案，支持TRX、USDT等多种加密货币',
    Plugin::VERSION => '1.0.0',
    Plugin::ARCH => Plugin::ARCH_CLI | Plugin::ARCH_FPM,
    Plugin::TYPE => Plugin::TYPE_PAY
];