<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class SupportLog
{
	public $functions;
	public $supporters;

	/**
	 * @param string[] $files
	 * @param array<int, array{0: string, 1: string}> $supporters
	 */
	public function __construct(
		array $files,
		array $supporters
	) {
		$this->files = $files;
		$this->supporters = $supporters;
	}
}
