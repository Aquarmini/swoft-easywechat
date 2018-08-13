<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-easywechat
 */
namespace Swoftx\EasyWeChat\MiniProgram;

use EasyWeChat\MiniProgram\Application as MiniProgramApplication;
use Swoftx\EasyWeChat\Kernel\Traits\SwoftHttpClientSupport;

class Application extends MiniProgramApplication
{
    use SwoftHttpClientSupport;
}
