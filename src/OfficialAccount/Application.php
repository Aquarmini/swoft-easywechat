<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-easywechat
 */
namespace Swoftx\EasyWeChat\OfficialAccount;

use EasyWeChat\OfficialAccount\Application as OfficialAccountApplication;
use Swoftx\EasyWeChat\Kernel\Traits\SwoftHttpClientSupport;

class Application extends OfficialAccountApplication
{
    use SwoftHttpClientSupport;
}
