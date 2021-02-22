<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;

use XdebugDotOrg\Model\Download;
use XdebugDotOrg\Model\Downloads;
use XdebugDotOrg\Model\Supporters;

class HomeController
{
	public static function getSupportersModel() : Supporters
	{
		$d = \dir( '../data/reports' );

		$files = [];

		while ( false !== ( $entry = $d->read() ) ) {
			if (preg_match( '@^20[0-9][0-9]-[01][0-9]\.txt$@', $entry, $m)) {
				$files[] = $entry;
			}
		}

		\rsort($files);

		return new Supporters(
			self::get_supporters()
		);
	}

	public static function index() : HtmlResponse
	{
		return new HtmlResponse(
			\XdebugDotOrg\Core\ContentsCache::fetchModel(
				Supporters::class,
				function() : Supporters {
					return self::getSupportersModel();
				},
				'log'
			),
			'home/index.php'
		);
	}

	public static function updates() : HtmlResponse
	{
		return new HtmlResponse(null, 'home/updates.php');
	}

	public static function license() : HtmlResponse
	{
		return new HtmlResponse(null, 'home/license.php');
	}

	public static function getAllDownloadsModel() : Downloads
	{
		// open the files dir, and scan
		$d = dir(dirname(__DIR__, 2) . '/html/files' );

		$files = [];

		while (false !== ($entry = $d->read())) {
			if (preg_match( '@^xdebug-([123]\.[0-9]\.[0-9].*?)\.tgz$@', $entry, $m)) {
				$m[1] = str_replace( 'rc', 'RC', $m[1] );
				$files[$m[1]]['source'] = $entry;
			}
			if (preg_match( '@^php_xdebug-([123]\.[0-9]\.[0-9].*?)-[45678]\.[0-9](\.[0-9])?(-v[cs](?>6|9|11|14|15|16))?(-nts)?(-(x86|x86_64))?\.dll$@', $entry, $m)) {
				$m[1] = str_replace( 'rc', 'RC', $m[1] );
				$files[$m[1]]['dll'][] = $entry;
			}
		}

		uksort($files, 'version_compare');

		$files = array_reverse($files);

		$downloads = [];

		foreach ($files as $version => $tar) {
			$f = stat( "files/{$tar['source']}" );
			$hashFile = "files/{$tar['source']}.sha256.txt";
			if ( file_exists( $hashFile ) )
			{
				$hash = trim( file_get_contents( $hashFile ) );
			}
			else
			{
				$hash = hash_file( "sha256", "files/{$tar['source']}" );
			}
			$date = (new \DateTimeImmutable)->setTimestamp($f['mtime']);
			$href = 'files/' . $tar['source'];

			$dlls = [];

			if (isset( $tar['dll'] )) {
				$links = [];

				natsort($tar['dll']);

				foreach ($tar['dll'] as $dls) {
					$s = stat( "files/$dls" );
					$hashFile = "files/{$dls}.sha256.txt";
					if ( file_exists( $hashFile ) )
					{
						$dll_hash = trim( file_get_contents( $hashFile ) );
					}
					else
					{
						$dll_hash = hash_file( 'sha256', "files/$dls" );
					}
					preg_match( '@^php_xdebug-[23]\.[0-9]\.[0-9].*?-([45678]\.[0-9])(\.[0-9])?(-(v[cs](?>6|9|11|14|15|16)))?(-nts)?(-(x86|x86_64))?\.dll$@', $dls, $m);
					$name = $m[1];
					$namea = '';
					if (isset($m[4]) && $m[4] != '') {
						$namea .= strtoupper( " {$m[4]}" );
					} else {
						$namea = ' VC6';
					}

					if (isset($m[5]) && $m[5] == '-nts') {
					} else {
						$namea .= " TS";
					}

					if (isset($m[7]) && $m[7] == 'x86_64') {
						$namea .= " (64 bit)";
					} else {
						$namea .= " (32 bit)";
					}

					$dlls[] = ['href' => 'files/' . $dls, 'name' => $name . $namea, 'hash' => $dll_hash];
				}
			}

			$downloads[] = new Download(
				$version,
				$date,
				$href,
				$hash,
				$dlls
			);
		}

		return new Downloads($downloads);
	}

	public static function getLatestDownloadsModel() : Downloads
	{
		$allDownloads = self::getAllDownloadsModel();

		return new Downloads( [ $allDownloads->downloads[0] ] );
	}

	public static function download() : HtmlResponse
	{
		return new HtmlResponse(
			\XdebugDotOrg\Core\ContentsCache::fetchModel(
				Downloads::class,
				function() : Downloads {
					return self::getLatestDownloadsModel();
				},
				'download'
			),
			'home/download.php'
		);
	}

	public static function historicalReleases() : HtmlResponse
	{
		return new HtmlResponse(
			\XdebugDotOrg\Core\ContentsCache::fetchModel(
				Downloads::class,
				function() : Downloads {
					return self::getAllDownloadsModel();
				},
				'historical-releases'
			),
			'home/historical-releases.php'
		);
	}

	public static function contributing() : HtmlResponse
	{
		return new HtmlResponse(null, 'home/contributing.php');
	}

	/**
	 * @return array<int, array{0: string, 1: string}>
	 */
	private static function get_supporters() : array
	{
		$f = file( '../data/reports/supporters.txt' );

		$lines = [];

		$supporters = [];

		foreach ($f as $line) {
			$line = trim( $line );
			list( $date, $name, $link ) = explode( "\t", $line );

			$now = new \DateTimeImmutable();
			$d = new \DateTimeImmutable( $date );
			$diff = $now->diff( $d );

			if ( $diff->invert == 0 )
			{
				continue;
			}
			if ( $diff->days > 400 )
			{
				continue;
			}

			$supporters[] = [$link, $name];
		}

		return $supporters;
	}
}
?>
