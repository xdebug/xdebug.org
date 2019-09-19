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
		$d = glob("news/*.txt");
		sort($d);
		$d = array_reverse( $d );

		$news_items = [];

		foreach ($d as $item) {
			$file = file( $item );
			$title = array_shift( $file );
			$date = new \DateTimeImmutable(preg_replace( '@^news/(.*).txt$@', '\1', $item ));
			$contents = join( '', $file );

			$news_items[] = new NewsItem($title, $date, $contents);
		}

		return $news_items;
	}

	public function items() : HtmlResponse
	{
		return new HtmlResponse(new NewsItems(self::getNewsItems()), 'news/items.php');
	}
}