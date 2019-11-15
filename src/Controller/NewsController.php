<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;
use XdebugDotOrg\Model\NewsItem;
use XdebugDotOrg\Model\NewsItems;

class NewsController
{
	/**
	 * @return NewsItem[]
	 */
	private static function getNewsItems() : array
	{
		$newsDataDir = self::getNewsDataDir();

		if (!is_dir($newsDataDir)) {
			throw new \Exception('Directory ' . $newsDataDir . ' should exist');
		}

		$d = glob($newsDataDir . '*.txt');
		sort($d);
		$d = array_reverse( $d );

		$news_items = [];

		foreach ($d as $item) {
			$file = file( $item );
			$title = array_shift( $file );
			$date = new \DateTimeImmutable(preg_replace( '@.+news/(.*).txt$@', '\1', $item ));
			$contents = join( '', $file );

			$news_items[] = new NewsItem($title, $date, $contents);
		}

		return $news_items;
	}

	private static function getNewsDataDir() : string
	{
		return dirname(__DIR__, 2) . '/data/news/';
	}

	public static function items() : HtmlResponse
	{
		return new HtmlResponse(new NewsItems(self::getNewsItems()), 'news/items.php');
	}

	public static function item(string $date) : HtmlResponse
	{
		$newsFile = self::getNewsDataDir() . $date . '.txt';

		if (!is_file($newsFile)) {
			throw new \XdebugDotOrg\PageNotFoundException('News item ' . $date . ' not found');
		}

		$file = file( $newsFile );
		$title = array_shift( $file );
		$date = new \DateTimeImmutable($date);
		$contents = join( '', $file );

		return new HtmlResponse(new NewsItem($title, $date, $contents), 'news/item.php');
	}

	public static function front_page() : HtmlResponse
	{
		return new HtmlResponse(new NewsItems(array_slice(self::getNewsItems(), 0, 5)), 'news/front_page.php');
	}
}
?>
