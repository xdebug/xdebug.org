<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class RelatedContentDescription
{
	public $type;
	public $media_type;
	public $title;
	public $description;
	public $url;

	final public const TYPE_YOUTUBE = 1;

	public function __construct(
		int $type,
		int $media_type,
		string $title,
		string $description,
		string $url
	) {
		$this->type = $type;
		$this->media_type = $media_type;
		$this->title = $title;
		$this->description = $description;
		$this->url = $url;
	}
}
?>
