<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;

use XdebugDotOrg\Model\SupportLog;
use XdebugDotOrg\Model\SupportLogDayReport;
use XdebugDotOrg\Model\SupportLogMonthReport;

class AiController
{
	public static function index() : HtmlResponse
	{
		return new HtmlResponse(null, 'ai/index.php');
	}
}
?>
