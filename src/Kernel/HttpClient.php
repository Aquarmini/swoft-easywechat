<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-easywechat
 */
namespace Swoftx\EasyWeChat\Kernel;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\RequestInterface;
use Swoft\Helper\JsonHelper;
use Swoft\HttpClient\Client;
use Swoftx\EasyWeChat\Kernel\Streams\SwooleStream;

class HttpClient implements ClientInterface
{
    protected $client;

    protected $config;

    public function __construct($config)
    {
        $this->client = new Client();
        $this->config = $config;
    }

    public function send(RequestInterface $request, array $options = [])
    {
        throw new GuzzleException('send is invalid，Please use request instead!');
    }

    public function sendAsync(RequestInterface $request, array $options = [])
    {
        throw new GuzzleException('SendAsync is invalid，Please use request instead!');
    }

    public function request($method, $uri, array $options = [])
    {
        $body = '';
        if (isset($options['query'])) {
            $uri .= '?' . http_build_query($options['query']);
        }

        if (isset($options['form_params'])) {
            $body = http_build_query($options['form_params']);
        }

        if (isset($options['json'])) {
            $body = JsonHelper::encode($options['json']);
        }

        $response = $this->client->request($method, $uri, [
            'body' => $body
        ])->getResponse();

        $string = $response->getBody()->getContents();

        return $response->withBody(new SwooleStream($string));
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
