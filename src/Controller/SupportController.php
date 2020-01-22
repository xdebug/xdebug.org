<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;

use XdebugDotOrg\Model\SupportLog;
use XdebugDotOrg\Model\SupportLogDayReport;
use XdebugDotOrg\Model\SupportLogMonthReport;

class SupportController
{
	public static function index() : HtmlResponse
	{
		return new HtmlResponse(null, 'support/index.php');
	}

	public static function reporting_bugs() : HtmlResponse
	{
		return new HtmlResponse(null, 'support/reporting_bugs.php');
	}

	public static function log() : HtmlResponse
	{
		return new HtmlResponse(
			\XdebugDotOrg\Core\ContentsCache::fetchModel(
				SupportLog::class,
				function() : SupportLog {
					return self::getLogModel();
				},
				'log'
			),
			'support/log.php'
		);
	}

	public static function getLogModel() : SupportLog
	{
		$d = \dir( '../data/reports' );

		$files = [];

		while ( false !== ( $entry = $d->read() ) ) {
			if (preg_match( '@^20[0-9][0-9]-[01][0-9]\.txt$@', $entry, $m)) {
				$files[] = $entry;
			}
		}

		\rsort($files);

		return new SupportLog(
			array_map(
				function($file) {
					return self::getMonthReport($file);
				},
				$files
			)
		);
	}

	private static function getMonthReport(string $file) : SupportLogMonthReport
	{
		$f = file( '../data/reports/'. $file );
		$summary = array_shift($f);

		preg_match( '/[0-9]{4}-[0-9]{2}/', $file, $matches );
		$d = new \DateTimeImmutable( "{$matches[0]}-01" );

		list($patreon, $github, $pro, $business, $others) = explode("\t", trim($summary));
		$total = (int) $patreon + (int) $github  + (int) $pro + (int) $business + (int) $others;

		$totalHours = [];

		$days = [];

		foreach ($f as $line) {
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

			$days[] = new SupportLogDayReport(
				$day,
				$type,
				$description,
				$hours
			);

			if ( ! isset( $totalHours[$type] ) )
			{
				$totalHours[$type] = 0;
			}
			$totalHours[$type] += (float) $hours;
		};

		krsort($totalHours);

		return new SupportLogMonthReport(
			$d,
			$others,
			$business,
			$pro,
			$patreon,
			$github,
			$days,
			$totalHours,
			new \DateTimeImmutable() > $d->modify( '+40 days' ) ? strtolower($d->format( 'F-Y' )) : null
		);
	}
}
?>
