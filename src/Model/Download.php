<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class Download
{
	public $version;
	public $date;
	public $href;
	public $hash;
	public $dlls;

	/**
	 * @param array<int, array{href: string, name: string, hash: string}> $dlls
	 */
	public function __construct(
		string $version,
		\DateTimeImmutable $date,
		string $href,
		string $hash,
		array $dlls
	) {
		$this->version = $version;
		$this->date = $date;
		$this->hash = $hash;
		$this->href = $href;
		$this->dlls = $dlls;
	}
}
?>
