<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;
use XdebugDotOrg\Model\Page;

class TemplateController
{
	/** @var string */
	public static $title = '';

	/** @var string */
	public static $headExtra = '';

	public static function setTitle(string $title) : void
	{
		self::$title = $title;
	}

	public static function setHeadExtra(string $headExtra) : void
	{
		self::$headExtra = $headExtra;
	}

	public static function default(string $contents) : HtmlResponse
	{
		return new HtmlResponse(new Page(self::$title, self::$headExtra, $contents), 'templates/default.php');
	}

	public static function default_menu() : HtmlResponse
	{
		return new HtmlResponse(null, 'templates/default_menu.php');
	}

	public static function support_menu() : HtmlResponse
	{
		return new HtmlResponse(null, 'templates/support_menu.php');
	}
}
?>
