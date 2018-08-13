<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-easywechat
 */
namespace Swoftx\EasyWeChat\Kernel\Providers;

use GuzzleHttp\Client;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Swoft\App;
use Swoftx\EasyWeChat\Kernel\HttpClient;

class SwoftHttpClientServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['http_client'] = function ($app) {
            if (App::isCoContext()) {
                return new HttpClient($app['config']->get('http', []));
            }
            return new Client($app['config']->get('http', []));
        };
    }
}
