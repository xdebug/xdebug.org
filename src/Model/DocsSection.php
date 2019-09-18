<?php

namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class DocsSection
{
    public $title;
    public $description;
    public $href;
    public $text;
    public $related_settings;
    public $related_functions;

    /**
     * @param array<Setting> $related_settings
     * @param array<FunctionDescription> $related_functions
     */
    public function __construct(
        string $title,
        string $description,
        string $href,
        ?string $text = null,
        array $related_settings = [],
        array $related_functions = []
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->href = $href;
        $this->text = $text;
        $this->related_settings = $related_settings;
        $this->related_functions = $related_functions;
    }
}
