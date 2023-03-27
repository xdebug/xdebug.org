<?php
/* Get secret key from the environment, and if it doesn't exist, fallback to the (hard coded) test key */
$SK = getenv( 'STRIPESECRET' );
$STRIPE_TEST = false;
if ( $SK === false || $SK === '' )
{
	$SK = getenv( 'STRIPETESTSECRET' );
	$STRIPE_TEST = true;
}
$stripeClient = new \Stripe\StripeClient( $SK );

/* MongoDB Link */
$mongoDB = new \MongoDB\Driver\Manager( 'mongodb://localhost:27017/' );

/* Protocol */
$protocol = 'https';

$sapi = php_sapi_name();
if ( $sapi === 'cli-server' )
{
    $protocol = 'http';
}
