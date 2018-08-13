<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-easywechat
 */
namespace Swoftx\EasyWeChat\Kernel\Traits;

use Swoftx\EasyWeChat\Kernel\Providers\SwoftHttpClientServiceProvider;
use Swoftx\EasyWeChat\Kernel\Providers\SwoftRequestServiceProvider;

trait SwoftHttpClientSupport
{
    /**
     * Return all providers.
     *
     * @return array
     */
    public function getProviders()
    {
        $providers = parent::getProviders();
        $providers[] = SwoftHttpClientServiceProvider::class;
        $providers[] = SwoftRequestServiceProvider::class;
        return $providers;
    }
}
