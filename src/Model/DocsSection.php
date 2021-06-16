<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class DocsSection
{
	public $title;
	public $description;
	public $supported_languages;
	public $related_content;
	public $href;
	public $text;
	public $related_settings;
	public $related_functions;
	public $tabFields;

	/**
	 * @param array<string> $supported_languages
	 * @param array<Setting> $related_settings
	 * @param array<FunctionDescription> $related_functions
	 * @param array<RelatedContent> $related_content
	 * @param string[] $tabFields
	 */
	public function __construct(
		string $title,
		string $description,
		array $supported_languages,
		string $href,
		?string $text = null,
		array $related_settings = [],
		array $related_functions = [],
		array $related_content = [],
		array $tabFields = []
	) {
		$this->title = $title;
		$this->description = $description;
		$this->supported_languages = $supported_languages;
		$this->href = $href;
		$this->text = $text;
		$this->related_settings = $related_settings;
		$this->related_functions = $related_functions;
		$this->related_content = $related_content;
		$this->tabFields = $tabFields;
	}
}
?>
