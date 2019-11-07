<?php
date_default_timezone_set( 'UTC' );
require_once(__DIR__ . '/../vendor/autoload.php');

/* Find files */
$d = glob( "../data/news/*txt" );
sort($d);
$d = array_reverse( $d );

$latest = preg_replace( '@^../data/news/(.*).txt$@', '\1', $d[0] );


$feed = new ezcFeed();
$feed->title = 'Xdebug.org announcements';
$feed->description = 'This is a feed showing the latest announcements from xdebug.org.';
$feed->published = new DateTime( "$latest 09:00" );
$author = $feed->add( 'author' );
$author->name = 'Derick Rethans';
$author->email = 'derick@xdebug.org';
$link = $feed->add( 'link' );
$link->href = 'http://xdebug.org';

foreach ( $d as $item )
{
	$date = preg_replace( '@^../data/news/(.*).txt$@', '\1', $item );
	$file = file( $item );
	$title = array_shift( $file );

	$item = $feed->add( 'item' );
	$item->title = trim( $title );
	$item->description = join( '', $file );
	$item->published = new DateTime( "$date 09:00" );
}

$xml = $feed->generate( 'rss2' );
header( 'Content-Type: ' . $feed->getContentType() . '; charset=utf-8' );
echo $xml;
