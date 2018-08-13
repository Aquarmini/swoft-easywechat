<?php
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