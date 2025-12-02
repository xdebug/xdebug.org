<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class DocsCategories
{
	/**
	 * @param array<DocsCategory> $categories
	 */
	public function __construct(
		public array $categories
	) {
	}
}
?>
