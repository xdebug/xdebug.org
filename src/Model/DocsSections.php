<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class DocsSections
{
	public $sections;

	/**
	 * @param array<DocsSection> $sections
	 */
	public function __construct(
		array $sections
	) {
		$this->sections = $sections;
	}
}
?>
