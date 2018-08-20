# Swoft EasyWeChat

本仓库不再维护，请使用者直接使用 `overtrue/wechat`。
并且配置composer.json。
~~~
"repositories": {
    "guzzle": {
        "type": "git",
        "url": "https://github.com/limingxinleo/guzzle.git"
    }
}
~~~

上述仓库，增加SwolleCoroutineHandler，当扩展跑在swoole协程下时，会自动使用该Handler处理请求。
当使用wechat server功能时，只需要自己初始化request即可。
~~~
/** @var \EasyWeChat\OfficialAccount\Application $app */
$app = OfficialAccount::instance()->app;

$get = $request->getSwooleRequest()->get ?? [];
$post = $request->getSwooleRequest()->post ?? [];
$attr = [];
$cookies = $request->getSwooleRequest()->cookie ?? [];
$files = $request->getSwooleRequest()->files ?? [];
$server = $request->getSwooleRequest()->server ?? [];
$raw = $request->getSwooleRequest()->rawContent();

// 初始化 Request
$app->request->initialize($get, $post, $attr, $cookies, $files, $server, $raw);
~~~

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