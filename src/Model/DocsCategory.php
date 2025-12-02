<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class DocsCategory
{
	/**
	 * @param array<DocsSection> $sections
	 */
	public function __construct(
		public string $title,
		public array $sections,
	) {
	}
}
?>
