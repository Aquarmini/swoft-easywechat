<?php
namespace Swoftx\EasyWeChat\Kernel\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Swoft\Core\RequestContext;

class SwoftRequestServiceProvider implements ServiceProviderInterface
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
        $pimple['request'] = function () {
            /** @var \Swoft\Http\Message\Server\Request $swoftRequest */
            $swoftRequest = RequestContext::getRequest();
            $swooleRequest = $swoftRequest->getSwooleRequest();

            $get = $swooleRequest->get ?? [];
            $post = $swooleRequest->post ?? [];
            $attr = [];
            $cookies = $swooleRequest->cookie ?? [];
            $files = $swooleRequest->files ?? [];
            $server = $swooleRequest->server ?? [];
            $raw = $swooleRequest->rawContent();

            // 初始化 Request
            $request = new Request($get, $post, $attr, $cookies, $files, $server, $raw);
            return $request;
        };
    }
}