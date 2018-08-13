<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-easywechat
 */
namespace Swoftx\EasyWeChat\Work;

use EasyWeChat\Work\Application as WorkApplication;
use Swoftx\EasyWeChat\Kernel\Traits\SwoftHttpClientSupport;

class Application extends WorkApplication
{
    use SwoftHttpClientSupport;
}
