<?php
function show_report( string $file )
{
	$f = file( 'reports/'. $file );
	$summary = array_shift($f);

	preg_match( '/[0-9]{4}-[0-9]{2}/', $file, $matches );
	$d = new DateTimeImmutable( "{$matches[0]}-01" );

	echo "<h2>" . $d->format( "F Y" ) . "</h2>\n";

//	var_dump( $summary, $f );

	list( $patreon, $basic, $company, $others ) = explode( "\t", trim( $summary) );
	$total = $patreon + $basic + $company + $others;

	echo <<<ENDDIV
<div class='funding'>
	<div class='others' style='width: {$others}%'></div>
	<div class='company' style='width: {$company}%'></div>
	<div class='basic' style='width: {$basic}%'></div>
	<div class='patreon' style='width: {$patreon}%'></div>
	<div class='comment'>Time Funded</div>
</div>

ENDDIV;

	$totalHours = [];
	$logTable = "<table class='log'>\n";
	$logTable .= "<tr><th class='day'>Day</th><th class='type'>Type</th><th class='description'>Description</th><th class='hours'>Hours</th></tr>\n";
	foreach( $f as $line )
	{
		$line = trim( $line );
		if ( $line == '' ) {
			continue;
		}
		list( $day, $type, $hours, $description ) = explode( "\t",  $line );

		$day = (int) substr( $day, 8, 2);
		$hours = sprintf( '%.2f', $hours );

		if ( $type == '' ) {
			$type = 'generic';
		};

		$logTable .= "<tr><td class='day'>{$day}</td><td class='type'><div class='type-{$type}'>{$type}</div></td><td>{$description}</td><td class='hours'>{$hours}</td></tr>\n";

		$totalHours[$type] += $hours;
	}
	$logTable .= "</table>\n";

	krsort( $totalHours );
	$spendBar = "<div class='spend'>\n";
	foreach( $totalHours as $type => $value )
	{
		$spendBar .= "<div class='type-{$type}' style='width: {$value}%'></div>\n";
	}
	$spendBar .= "<div class='comment'>Time Spent</div>\n";
	$spendBar .= "</div>\n";

	echo $spendBar;
	echo $logTable;

	$url = strtolower( $d->format( 'F-Y' ) );

	$from = $d->modify( '+40 days' );
	if (new \DateTimeImmutable() > $from )
	{
		echo "<p>For additional information, please see the <a href='https://derickrethans.nl/xdebug-update-{$url}.html'>monthly</a> report.</p>\n";
	}
}

function show_supporters()
{
	$f = file( 'reports/supporters.txt' );

	$lines = [];

	echo "<ul class='supporters'>\n";
	foreach ($f as $line) {
		$line = trim( $line );
		list( $date, $name, $link ) = explode( "\t", $line );

		$now = new \DateTimeImmutable();
		$d = new \DateTimeImmutable( $date );
		$diff = $now->diff( $d );

		if ( $diff->days > 365 )
		{
			continue;
		}

		echo "<li><a href='{$link}'>{$name}</a></li>\n";
	}
	echo "</ul>\n";
}
