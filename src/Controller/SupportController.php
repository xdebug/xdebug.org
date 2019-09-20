<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;

use XdebugDotOrg\Model\SupportLog;

class SupportController
{
	public function index() : HtmlResponse
	{
		return new HtmlResponse(null, 'support/index.php');
	}

	public function reporting_bugs() : HtmlResponse
	{
		return new HtmlResponse(null, 'support/reporting_bugs.php');
	}

	public function log() : HtmlResponse
	{
		$d = Dir( 'reports' );

		$files = array();
		while ( false !== ( $entry = $d->read() ) )
		{
			if (preg_match( '@^20[0-9][0-9]-[01][0-9]\.txt$@', $entry, $m)) {
				$files[] = $entry;
			}
		}

		rsort($files);



		return new HtmlResponse(
			new SupportLog($files, self::get_supporters()),
			'support/log.php'
		);
	}

	public static function get_report( string $file ) : string
	{
		$f = file( 'reports/'. $file );
		$summary = array_shift($f);

		preg_match( '/[0-9]{4}-[0-9]{2}/', $file, $matches );
		$d = new \DateTimeImmutable( "{$matches[0]}-01" );

		$html = "<h2>" . $d->format( "F Y" ) . "</h2>\n";

	//	var_dump( $summary, $f );

		list( $patreon, $basic, $company, $others ) = explode( "\t", trim( $summary) );
		$total = (int) $patreon + (int) $basic + (int) $company + (int) $others;

		$html .= "
			<div class='funding'>
				<div class='others' style='width: {$others}%'></div>
				<div class='company' style='width: {$company}%'></div>
				<div class='basic' style='width: {$basic}%'></div>
				<div class='patreon' style='width: {$patreon}%'></div>
				<div class='comment'>Time Funded</div>
			</div>";

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

		$html .= $spendBar;
		$html .= $logTable;

		$url = strtolower( $d->format( 'F-Y' ) );

		$from = $d->modify( '+40 days' );
		if (new \DateTimeImmutable() > $from )
		{
			$html .="<p>For additional information, please see the <a href='https://derickrethans.nl/xdebug-update-{$url}.html'>monthly</a> report.</p>\n";
		}

		return $html;
	}

	/**
	 * @return array<int, array{0: string, 1: string}>
	 */
	private static function get_supporters() : array
	{
		$f = file( 'reports/supporters.txt' );

		$lines = [];

		$supporters = [];

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

			$supporters[] = [$link, $name];
		}

		return $supporters;
	}
}
