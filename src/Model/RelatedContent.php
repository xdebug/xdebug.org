<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class RelatedContent
{
	public $content;

	/**
	 * @param RelatedContentDescription[] $content
	 */
	public function __construct(
		array $content
	) {
		$this->content = $content;
	}
}
?>
