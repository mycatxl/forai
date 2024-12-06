<?php
declare(strict_types=1);

use Kernel\Plugin\Const\Plugin;

return [
    Plugin::NAME => 'Bepusdt',
    Plugin::AUTHOR => 'Github',
    Plugin::DESCRIPTION => '自开发',
    Plugin::VERSION => '1.0.3',
    Plugin::ARCH => Plugin::ARCH_CLI | Plugin::ARCH_FPM,
    Plugin::TYPE => Plugin::TYPE_PAY
];