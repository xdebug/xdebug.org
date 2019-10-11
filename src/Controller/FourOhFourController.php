<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;

class FourOhFourController
{
	public static function error() : HtmlResponse
	{
		return new HtmlResponse(null, 'fourohfour/404.php');
	}
}
?>
