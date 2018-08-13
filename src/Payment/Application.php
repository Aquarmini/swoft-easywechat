<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-easywechat
 */
namespace Swoftx\EasyWeChat\Payment;

use EasyWeChat\Payment\Application as PaymentApplication;
use Swoftx\EasyWeChat\Kernel\Traits\SwoftHttpClientSupport;

class Application extends PaymentApplication
{
    use SwoftHttpClientSupport;
}
