<?php
namespace Swoftx\EasyWeChat\Kernel;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\RequestInterface;
use Swoft\HttpClient\Client;

class HttpClient implements ClientInterface
{
    protected $client;

    protected $config;

    public function __construct($config)
    {
        $this->client = new Client($config);
        $this->config = $config;
    }

    public function send(RequestInterface $request, array $options = [])
    {
        $adapter = $this->client->getAdapter();
        return $adapter->request($request, $options)->getResponse();
    }

    public function sendAsync(RequestInterface $request, array $options = [])
    {
        throw new GuzzleException('SendAsync is invalid，Please use send instead!');
    }

    public function request($method, $uri, array $options = [])
    {
        return $this->client->request($method, $uri, $options)->getResponse();
    }

    public function requestAsync($method, $uri, array $options = [])
    {
        throw new GuzzleException('requestAsync is invalid，Please use request instead!');
    }

    public function getConfig($option = null)
    {
        return $option === null
            ? $this->config
            : (isset($this->config[$option]) ? $this->config[$option] : null);
    }
}

