<?php
if ( php_sapi_name() != 'cli' ) {
	die();
}

require __DIR__ . '/../../vendor/autoload.php';

class drDocumentDocbookToTextExternalLinkHandler extends ezcDocumentDocbookToRstBaseHandler
{
    /**
     * Handle a node
     *
     * Handle / transform a given node, and return the result of the
     * conversion.
     *
     * @param ezcDocumentElementVisitorConverter $converter
     * @param DOMElement $node
     * @param mixed $root
     * @return mixed
     */
    public function handle( ezcDocumentElementVisitorConverter $converter, DOMElement $node, $root )
    {
        $id = $converter->appendLink( $node->getAttribute( 'url' ) );
        $root .= $converter->visitChildren( $node, '' ) . " [{$id}]";
        return $root;
    }
}

class drDocumentDocbookToTextInternalLinkHandler extends ezcDocumentDocbookToRstBaseHandler
{
    /**
     * Handle a node
     *
     * Handle / transform a given node, and return the result of the
     * conversion.
     *
     * @param ezcDocumentElementVisitorConverter $converter
     * @param DOMElement $node
     * @param mixed $root
     * @return mixed
     */
    public function handle( ezcDocumentElementVisitorConverter $converter, DOMElement $node, $root )
    {
        $root .= $converter->visitChildren( $node, '' );
        return $root;
    }
}

class drDocumentDocbookToTextListItemHandler extends ezcDocumentDocbookToRstBaseHandler
{
    /**
     * Handle a node
     *
     * Handle / transform a given node, and return the result of the
     * conversion.
     *
     * @param ezcDocumentElementVisitorConverter $converter
     * @param DOMElement $node
     * @param mixed $root
     * @return mixed
     */
    public function handle( ezcDocumentElementVisitorConverter $converter, DOMElement $node, $root )
    {
        $root .= $converter->visitChildren( $node, '' );
        return $root;
    }
}

class drDocumentDocbookToLiteralLayoutHandler extends ezcDocumentDocbookToRstLiteralLayoutHandler
{
    /**
     * Handle a node
     *
     * Handle / transform a given node, and return the result of the
     * conversion.
     *
     * @param ezcDocumentElementVisitorConverter $converter
     * @param DOMElement $node
     * @param mixed $root
     * @return mixed
     */
    public function handle( ezcDocumentElementVisitorConverter $converter, DOMElement $node, $root )
    {
        if ( !$node->hasAttribute( 'class' ) ||
             ( $node->getAttribute( 'class' ) !== 'normal' ) )
        {
            $root .= preg_replace( '(\r\n|\r|\n)', "\n    ", $node->textContent ) . "\n";
        }
        else
        {
            $root .= "\n| " . preg_replace( '(\r\n|\r|\n)', "\n| ", $node->textContent ) . "\n";
        }

        return $root;
    }
}


class drDocumentDocbookToTextTableHandler extends ezcDocumentDocbookToRstTableHandler
{
    protected function estimateColumnWidths( ezcDocumentElementVisitorConverter $converter, DOMElement $table )
    {
		$storage = $converter->storage;
		$converter->storage = null;
        // Get all rows from the table
        $rows = $table->getElementsByTagName( 'row' );

		// Loop over rows, and for each row determine the max width
		$widths = array();
		$rowNr = 0;
        foreach ( $rows as $row )
        {
            $cellNr = 0;
            foreach ( $row->childNodes as $cell )
            {
                if ( ( $cell->nodeType === XML_ELEMENT_NODE ) &&
                     ( $cell->tagName === 'entry' ) )
                {
                    $cellContent = explode( "\n", trim( $converter->visitChildren( $cell, '' ) ) );
					$widths[$cellNr] = @max( $widths[$cellNr], $this->getMaxLineLength( $cellContent ) );
                    ++$cellNr;
                }
            }
            ++$rowNr;
        }

		$converter->storage = $storage;

		return $widths;
    }
}


class drDocumentDocbookToTextConvertor extends ezcDocumentDocbookToRstConverter
{
	public $storage;

	function __construct( ezcDocumentDocbookToRstConverterOptions $options = null )
	{
		parent::__construct( $options );

		$this->visitorElementHandler['docbook']['ulink'] = new drDocumentDocbookToTextExternalLinkHandler();
		$this->visitorElementHandler['docbook']['link'] = new drDocumentDocbookToTextInternalLinkHandler();
		$this->visitorElementHandler['docbook']['table'] = new drDocumentDocbookToTextTableHandler();
		$this->visitorElementHandler['docbook']['listitem'] = new drDocumentDocbookToTextListItemHandler();
		$this->visitorElementHandler['docbook']['literallayout'] = new drDocumentDocbookToLiteralLayoutHandler();
	}

	protected function visitText( DOMText $node, $root )
	{
        if ( trim( $wholeText = $node->data ) !== '' )
        {
            $root .= $wholeText;
        }

        return $root;
	}

	public function appendLink( $link )
	{
		$this->links[] = $link;
		return count( $this->links );
	}

    /**
     * Append all remaining links at the bottom of the last element.
     *
     * @param string $root
     * @return string
     */
    public function finishParagraph( $root )
    {
        // Only finish paragraph, if there is no current indentation, otherwise
        // this might break a single list into multiple lists
        if ( $this->skipPostDecoration ||
             ( self::$indentation > 0 ) )
        {
            return $root;
        }

        $appended = false;

        // Append links to paragraph
        foreach ( $this->links as $index => $link )
        {
            $root .= '[' . ( $index + 1 ) . "] {$link}\n";
            $appended = true;
        }
        $this->links = array();

        // Append directive targets to paragraph
        foreach ( $this->directives as $directive )
        {
            $root .= $directive;
            $appended = true;
        }
        $this->directives = array();

        return $root . ( $appended ? "\n" : '' );
    }
}


$ext = new ReflectionExtension('xdebug');

$settingClass = new XdebugDotOrg\Controller\Docs\SettingsController;
$settings = $settingClass->getRelatedSettings(null, false);
ksort( $settings );

$extVersion = phpversion("Xdebug");

echo "; This file is generated by the 'xdebug.org:html/docs/convert.php' robot\n; for Xdebug {$extVersion} — do not modify by hand\n\n";

$foundSettings = [];

foreach( $settings as $info )
{
	$foundSettings[] = $info->name;
	$w = str_repeat( '-', 77 );

	$xhtml = new ezcDocumentXhtml();

	$xhtml->loadString( XdebugDotOrg\Controller\DocsController::process_macros_without_links( $info->text ) );

	$docbook = $xhtml->getAsDocbook();

	$convertor = new drDocumentDocbookToTextConvertor();
	$rst = $convertor->convert( $docbook );

	/* If info->version != NULL there are version constraints */
	$version = ";";
	if ( $info->version )
	{
		list( $constraint, $settingVersion ) = explode( ' ', $info->version );

		if ( version_compare( $settingVersion, $extVersion, $constraint ) )
		{
			continue;
		}
		if ( version_compare( $settingVersion, $extVersion, '<=' ) )
		{
			$version = ";\n; Introduced in version {$settingVersion}\n;";
		}
	}

	$d = $rst->save();

	$d = join( "\n; ", explode( "\n", $d ) );
	$desc = '';
	foreach( explode( "\n", trim( $d ) ) as $s )
	{
		$trimmed = trim( $s );
		if ( $trimmed !== '' )
		{
			$desc .= trim( $s ) . "\n";
		}
	}
	$desc = trim( $desc );

	echo <<<ENDL
; $w
; xdebug.{$info->name}
$version
; Type: {$info->type}, Default value: {$info->default}
;
; $desc
;
;xdebug.{$info->name} = {$info->default}


ENDL;

}

/* Check for missing settings */
$extensionSettings = array_keys( $ext->getINIEntries() );
foreach ( $extensionSettings as $settingName )
{
	$sanitizedSettingName = preg_replace( '/^xdebug\./', '', $settingName );

	if ( !in_array( $sanitizedSettingName, $foundSettings ) && !preg_match( '@^This setting has been@', ini_get( $settingName ) ) )
	{
		fprintf( STDERR, "$settingName is missing\n" );
	}
}


