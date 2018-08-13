<?php

namespace SwoftTest\Cases\EasyWeChat;

use Swoftx\EasyWeChat\Factory;
use SwoftTest\Cases\AbstractTestCase;
use Swoftx\EasyWeChat\Kernel\HttpClient;

class HttpClientTest extends AbstractTestCase
{
    public function testInstanceOfSwoftHttpClient()
    {
        $app = Factory::basicService([]);
        $httpClient = $app->http_client;
        $this->assertInstanceOf(HttpClient::class, $httpClient);
    }

    public function testAccessToken()
    {
        $log = alias('@runtime');
        $config = [
            'app_id' => env('WECHAT_APP_ID'),
            'secret' => env('WECHAT_SECRET'),

            // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
            'response_type' => 'array',

            'log' => [
                'level' => 'debug',
                'file' => $log . '/wechat.log',
            ],
        ];

        go(function () use ($config) {
            $app = Factory::officialAccount($config);

            print_r($app->access_token->getToken(true));
        });
    }
}