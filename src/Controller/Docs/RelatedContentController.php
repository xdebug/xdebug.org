<?php
namespace XdebugDotOrg\Controller\Docs;

use XdebugDotOrg\Core\HtmlResponse;
use XdebugDotOrg\Model\RelatedContent;
use XdebugDotOrg\Model\RelatedContentDescription;
use XdebugDotOrg\Controller\DocsController;

class RelatedContentController
{
	/**
	 * @var ?array<int, RelatedContentDescription>
	 */
	private static $contentList = null;

	public static function single(RelatedContentDescription $function) : HtmlResponse
	{
		return new HtmlResponse($function, 'docs/content.php');
	}

	public static function singleLine(RelatedContentDescription $function) : HtmlResponse
	{
		return new HtmlResponse($function, 'docs/content_line.php');
	}

	/**
	 * @return array<int, RelatedContentDescription>
	 */
	private static function getContent() : array
	{
		if (self::$contentList !== null) {
			return self::$contentList;
		}

		$contentList = [];

		$function_include_dir = dirname( __DIR__, 3) . '/html/docs/include/related_content/';

		if (!file_exists($function_include_dir )) {
			throw new \Exception($function_include_dir . ' should exist');
		}

		$f = glob( $function_include_dir . '*' );

		foreach ( $f as $filename ) {
			if ( !is_file( $filename ) ) {
				continue;
			}

			$contents = file( $filename );

			$contentList[] = new RelatedContentDescription(
				(int) constant( trim( $contents[0] ) ),
				(int) constant( trim( $contents[1] ) ),
				(string) trim( $contents[2] ),
				(string) trim( $contents[3] ),
				(string) trim( $contents[4] ),
			);
		}
		return $contentList;
	}

	/**
	 * @return RelatedContentDescription[]
	 */
	public static function getRelatedContent(int $func) : array
	{
		$content = array_filter(
			self::getContent(),
			function ($function) use ($func) {
				return $func & $function->type;
			}
		);

		usort($content, fn($a, $b) => $a->title <=> $b->title );

		return $content;
	}

	public static function all() : HtmlResponse
	{
		$content = self::getContent();

		usort($content, fn($a, $b) => $a->title <=> $b->title );

		return new HtmlResponse(new RelatedContent($content), 'docs/all_content.php');
	}
}
?>
