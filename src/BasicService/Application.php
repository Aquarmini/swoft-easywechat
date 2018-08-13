<?php
namespace Swofts\EasyWeChat\BasicService;

use EasyWeChat\BasicService\Application as BasicServiceApplication;
use Swofts\EasyWeChat\Kernel\Traits\SwoftHttpClientSupport;

class Application extends BasicServiceApplication
{
    use SwoftHttpClientSupport;
}