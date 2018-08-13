<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-easywechat
 */
namespace Swofts\EasyWeChat\Kernel\Traits;

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
        $providers[] = '';
        return $providers;
    }
}
