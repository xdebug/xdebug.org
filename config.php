<?php
/* Get secret key from the environment, and if it doesn't exist, fallback to the (hard coded) test key */
$SK = getenv( 'STRIPESECRET' );
$STRIPE_TEST = false;
if ( $SK === false || $SK === '' )
{
	$SK = getenv( 'STRIPETESTSECRET' );
	$STRIPE_TEST = true;
}
if ( $SK === false || $SK === '' )
{
	$SK = 'unavailable';
	$STRIPE_TEST = true;
}

$stripeClient = new \Stripe\StripeClient( $SK );

/* Sqlite Link */
$sqlitePath = __DIR__ . '/cache/stripe.sqlite';
$sqlite = PDO::connect( "sqlite:{$sqlitePath}" );

/* SMTP Service */
$SMTP_SERVER   = getenv( 'SMTP_SERVER' );
$SMTP_USERNAME = getenv( 'SMTP_USERNAME' );
$SMTP_PASSWORD = getenv( 'SMTP_PASSWORD' );

$o = new ezcMailSmtpTransportOptions();
$o->connectionType = ezcMailSmtpTransport::CONNECTION_TLS;
$smtpServer = new ezcMailSmtpTransport( $GLOBALS['SMTP_SERVER'], $GLOBALS['SMTP_USERNAME'], $GLOBALS['SMTP_PASSWORD'], null, $o );

/* Protocol */
$protocol = 'https';

$sapi = php_sapi_name();
if ( $sapi === 'cli-server' )
{
    $protocol = 'http';
}
