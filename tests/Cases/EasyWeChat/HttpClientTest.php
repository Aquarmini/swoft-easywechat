<?php
namespace SwoftTest\Cases\EasyWeChat;

use Swoft\HttpClient\Client;
use Swoftx\EasyWeChat\Factory;
use SwoftTest\Cases\AbstractTestCase;

class HttpClientTest extends AbstractTestCase
{
    public function testInstanceOfSwoftHttpClient()
    {
        $app = Factory::basicService([]);
        $httpClient = $app->http_client;
        $this->assertInstanceOf(Client::class, $httpClient);
    }
}