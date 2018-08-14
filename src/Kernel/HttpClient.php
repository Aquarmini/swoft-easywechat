<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-easywechat
 */
namespace Swoftx\EasyWeChat\Kernel;

use EasyWeChat\Kernel\AccessToken;
use EasyWeChat\Kernel\ServiceContainer;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Swoft\HttpClient\Client;
use Swoftx\EasyWeChat\Kernel\Streams\SwooleStream;

class HttpClient implements ClientInterface
{
    protected $client;

    protected $config;

    /** @var ServiceContainer */
    protected $app;

    public function __construct($app, $config)
    {
        $defaults = [];
        if (isset($config['base_uri'])) {
            $defaults['base_uri'] = $config['base_uri'];
        }
        $this->client = new Client($defaults);
        $this->config = $defaults;
        $this->app = $app;
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
        if (isset($options['query']) && is_array($options['query']) && count($options['query']) > 0) {
            $uri .= '?' . http_build_query($options['query']);
        }

        $body = $options['body'] ?? '';
        $headers = $options['headers'] ?? [];

        if (isset($this->config['base_uri'])) {
            $uri = str_replace($this->config['base_uri'], '', $uri);
        }

        if ($this->app->access_token) {
            /** @var AccessToken $accessToken */
            $accessToken = $this->app->access_token;
            $request = new Request($method, $uri, $headers, $body);
            $request = $accessToken->applyToRequest($request, $options);
            $uri = $request->getUri();
        }

        $response = $this->client->request($method, $uri, [
            'body' => $body,
            'headers' => $headers,
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
