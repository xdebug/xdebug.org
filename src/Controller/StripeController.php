<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;
use XdebugDotOrg\Core\HtmlRedirect;

use XdebugDotOrg\StripeHandler;

use XdebugDotOrg\Model\StripeResult;
use XdebugDotOrg\Model\SubscriptionData;

class StripeController
{
	public static function buyForm(string $package = 'pro') : HtmlResponse|HtmlRedirect
	{
		if ( $_POST && isset( $_POST['submit'] ) )
		{
			return self::processSubmit($_POST);
		}

		return new HtmlResponse(new SubscriptionData(package: $package), 'stripe/index.php');
	}

	private static function processSubmit( array $data )
	{
		$stripe = new StripeHandler( $GLOBALS['stripeClient'], $GLOBALS['mongoDB'], $GLOBALS['STRIPE_TEST'] );

		if ( ( $reason = $stripe->validateData( $data ) ) !== true )
		{
			return new HtmlResponse(new StripeResult(false, $reason, package: $_POST['package'] ), 'stripe/index.php');
		}
		if ( ( $reason = $stripe->processPayment() ) !== true )
		{
			// It is always true, for now
		}

		return new HtmlRedirect( $stripe->getUri() );
	}

	public static function stripeResult( string $guid, string $mode ) : HtmlResponse
	{
		$stripe = new StripeHandler( $GLOBALS['stripeClient'], $GLOBALS['mongoDB'], $GLOBALS['STRIPE_TEST'] );

		$stripeSession = $stripe->getSession( $guid );

		if ( $stripeSession != NULL && $mode === 'success' && $stripeSession->hasPaid() )
		{
			$stripeSession->updateAsSuccess();
			return new HtmlResponse( $stripeSession, 'stripe/thanks.php' );
		}

		return new HtmlResponse( $stripeSession, 'stripe/cancelled.php' );
	}
}
?>
