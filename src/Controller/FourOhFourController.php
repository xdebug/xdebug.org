<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;

class FourOhFourController
{
	public static function error(string $message = '404 Not Found') : HtmlResponse
	{
		return new HtmlResponse((object) ['message' => $message], 'fourohfour/404.php');
	}
}
?>
