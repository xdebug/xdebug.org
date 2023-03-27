<?php
namespace XdebugDotOrg\Core;

class HtmlRedirect extends \StdClass
{
	public function __construct(public string $uri)
	{
	}

	public function getURI() : string
	{
		return $this->uri;
	}
}
?>
