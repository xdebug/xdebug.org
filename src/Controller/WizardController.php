<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;

use XdebugDotOrg\Model\WizardFailure;
use XdebugDotOrg\Model\WizardResult;

class WizardController
{
	public static function index() : HtmlResponse
	{
		if ($_POST
			&& isset( $_POST['submit'] )
			&& isset( $_POST['data'] )
		) {
			return self::getResults($_POST['data']);
		}

		return new HtmlResponse(null, 'wizard/index.php');
	}

	public static function getResults(string $data) : HtmlResponse
	{
		$x = new \XdebugDotOrg\XdebugVersion( $data );

		if (($reason = $x->determineSupported() ) !== true) {
			return new HtmlResponse(new WizardFailure($reason), 'wizard/failure.php');
		}

		return new HtmlResponse(new WizardResult($x), 'wizard/result.php');
	}
}
