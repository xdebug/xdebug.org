<?php

namespace XdebugDotOrg\Model;

use ezcMailAddress;
use ezcMailComposer;
use ezcMailSmtpTransport;

use Stripe\StripeClient;

class StripeSession
{
	const table = 'stripe';

	public function __construct( private StripeClient $client, private \Pdo\Sqlite $sqlite, public object $data )
	{

	}

	public function hasPaid() : bool
	{
		$stripe_id = $this->data->stripe->id;

		/* Retrieve Stripe Session */
		$stripeSession = $this->client->checkout->sessions->retrieve( $stripe_id );

		$paid = $stripeSession->payment_status === 'paid';

		if ( $paid )
		{
			$this->data->paid_at = new \DateTimeImmutable();
			try
			{
				$this->sendSignupEmail( $this->data );
			}
			catch ( \ezcMailTransportException $e )
			{
				echo $e->getMessage(), "\n";
			}
			return true;
		}

		return false;
	}

	public function updateAsSuccess()
	{
		$stmt = $this->sqlite->prepare( 'UPDATE ' . self::table . ' SET paidAt = ? WHERE id = ?' );
		$stmt->execute( [ $this->data->paid_at->getTimestamp(), $this->data->_id ] );
	}

	private function sendSignupEmail( $data )
	{
		$m = new ezcMailComposer;
		$m->from = new ezcMailAddress( 'support@xdebug.org', 'Xdebug Support Subscription Form' );
		$m->addTo( new ezcMailAddress( 'support@xdebug.org', 'Xdebug Support', 'utf-8' ) );
		$m->subject = 'Xdebug Subscription Payment';

		$m->plainText = json_encode( $data, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT | JSON_INVALID_UTF8_IGNORE );

		$m->build();

		$s = new ezcMailSmtpTransport('localhost');
		$s->send( $m );
	}

    private function sendPaymentCancelled( $data )
    {
        $m = new ezcMailComposer;
        $m->from = new ezcMailAddress( 'support@xdebug.org', 'Xdebug Support Subscription Form' );
        $m->addTo( new ezcMailAddress( 'support@xdebug.org', 'Xdebug Support', 'utf-8' ) );
        $m->subject = 'Xdebug Subscription Payment CANCELLED';

        $m->plainText = json_encode( $data, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT | JSON_INVALID_UTF8_IGNORE );

        $m->build();

		$s = new ezcMailSmtpTransport('localhost');
        $s->send( $m );
    }

    public function updateAsFailure()
    {
		try
		{
			$this->sendPaymentCancelled( $this->data );
		}
		catch ( \ezcMailTransportException $e )
		{
			echo $e->getMessage(), "\n";
		}
    }
}
