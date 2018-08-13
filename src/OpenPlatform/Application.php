<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-easywechat
 */
namespace Swoftx\EasyWeChat\OpenPlatform;

use EasyWeChat\OpenPlatform\Application as OpenPlatformApplication;
use Swoftx\EasyWeChat\Kernel\Traits\SwoftHttpClientSupport;

class Application extends OpenPlatformApplication
{
    use SwoftHttpClientSupport;
}
