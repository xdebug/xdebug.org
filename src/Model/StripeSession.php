<?php

namespace XdebugDotOrg\Model;

use ezcMailAddress;
use ezcMailComposer;
use ezcMailMtaTransport;

use MongoDB\BSON\UTCDateTime;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Manager;
use Stripe\StripeClient;

class StripeSession
{
	const ns = 'xdebug.stripe';

	public function __construct( private StripeClient $client, private Manager $mongodb, public object $data )
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
			if ( !isset( $this->data->paid_at ) )
			{
				$this->data->paid_at = new UTCDateTime();
			}
			$this->data->stripe->payment_status = 'paid';

			$this->sendSignupEmail( $this->data );
			return true;
		}

		return false;
	}

	public function updateAsSuccess()
	{
		if ( !isset( $this->data->paid_at ) )
		{
			$bw = new BulkWrite();
			$bw->update(
				['_id' => $this->data->_id],
				['$set' => [
					'paid_at' => new UTCDateTime(),
					'stripe.payment_status' => 'paid'
				]]
			);

			$res = $this->mongodb->executeBulkWrite(self::ns, $bw);
		}
	}

	private function sendSignupEmail( $data )
	{
		$m = new ezcMailComposer;
		$m->from = new ezcMailAddress( 'support@xdebug.org', 'Xdebug Support Subscription Form' );
		$m->addTo( new ezcMailAddress( 'support@xdebug.org', 'Xdebug Support', 'utf-8' ) );
		$m->subject = 'Xdebug Subscription Payment';

		$m->plainText = json_encode( $data, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT | JSON_INVALID_UTF8_IGNORE );

		$m->build();

		$s = new ezcMailMtaTransport();
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

        $s = new ezcMailMtaTransport();
        $s->send( $m );
    }

    public function updateAsFailure()
    {
        $this->sendPaymentCancelled( $this->data );
    }
}
