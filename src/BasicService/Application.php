<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-easywechat
 */
namespace Swofts\EasyWeChat\BasicService;

use EasyWeChat\BasicService\Application as BasicServiceApplication;
use Swofts\EasyWeChat\Kernel\Traits\SwoftHttpClientSupport;

class Application extends BasicServiceApplication
{
    use SwoftHttpClientSupport;
}
