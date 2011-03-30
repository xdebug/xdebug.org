<?php
if ( php_sapi_name() != 'cli' ) {
	die();
}
include 'include/basic.php';
include 'include/settings.php';
include 'include/features.php';
include '/home/derick/dev/zetacomponents/trunk/Base/src/ezc_bootstrap.php';

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


class drDocumentDoctookToTextConvertor extends ezcDocumentDocbookToRstConverter
{
	public $storage;

	function __construct( ezcDocumentDocbookToRstConverterOptions $options = null )
	{
		parent::__construct( $options );

		$this->visitorElementHandler['docbook']['ulink'] = new drDocumentDocbookToTextExternalLinkHandler();
		$this->visitorElementHandler['docbook']['link'] = new drDocumentDocbookToTextInternalLinkHandler();
		$this->visitorElementHandler['docbook']['table'] = new drDocumentDocbookToTextTableHandler();
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
ksort( $settings );

echo "; This is a generated file, do not modify by hand\n\n";

foreach( $settings as $name => $info )
{
	$w = str_repeat( '-', 77 );
$xhtml = new ezcDocumentXhtml();
$xhtml->loadString( ignore_links( $info[3] ) );
$docbook = $xhtml->getAsDocbook();
// echo $docbook->save(), "\n\n";
$convertor = new drDocumentDoctookToTextConvertor();
$rst = $convertor->convert( $docbook );

$d = $rst->save();

$d = join( "\n; ", explode( "\n", $d ) );

	echo <<<ENDL
; $w
; xdebug.$name
;
; Type: {$info[0]}, Default value: {$info[1]}
;
; $d
;
;xdebug.$name = {$info[1]}


ENDL;

}

/* Check for missing settings */
$extensionSettings = array_keys( $ext->getINIEntries() );
foreach ( $extensionSettings as $settingName )
{
	$sanitizedSettingName = preg_replace( '/^xdebug\./', '', $settingName );
	if ( !isset( $settings[$sanitizedSettingName] ) )
	{
		fprintf( STDERR, "$settingName is missing\n" );
	}
}


