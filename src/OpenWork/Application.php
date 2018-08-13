<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-easywechat
 */
namespace Swoftx\EasyWeChat\OpenWork;

use EasyWeChat\OpenWork\Application as OpenWorkApplication;
use Swoftx\EasyWeChat\Kernel\Traits\SwoftHttpClientSupport;

class Application extends OpenWorkApplication
{
    use SwoftHttpClientSupport;
}
