# Swoft EasyWeChat

用法与EasyWeChat没有区别，请实现自己的基于协程的单例。

~~~php
<?php

namespace App\Core\Wechat;

use App\Core\Wechat\Config\OfficialAccountConfig;
use Swoftx\EasyWeChat\Factory;
use Xin\Swoft\Traits\InstanceTrait;

/**
 * Class OfficialAccount
 * @package App\Core\Wechat
 */
class OfficialAccount
{
    use InstanceTrait;

    /**
     * @var OfficialAccountConfig
     */
    public $config;

    public $app;

    public function __construct()
    {
        $this->config = bean(OfficialAccountConfig::class);
        $dir = alias('@runtime/logs');
        $config = [
            'app_id' => $this->config->getAppId(),
            'secret' => $this->config->getSecret(),
            'token' => $this->config->getToken(),
            'aes_key' => $this->config->getAesKey(),

            // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
            'response_type' => 'array',

            'log' => [
                'level' => 'debug',
                'file' => $dir . '/wechat.log',
            ],
        ];

        $this->app = Factory::officialAccount($config);
    }
}

~~~