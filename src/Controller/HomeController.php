<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;

use XdebugDotOrg\Model\Download;
use XdebugDotOrg\Model\Downloads;

class HomeController
{
	public static function index() : HtmlResponse
	{
		return new HtmlResponse(null, 'home/index.php');
	}

	public static function updates() : HtmlResponse
	{
		return new HtmlResponse(null, 'home/updates.php');
	}

	public static function license() : HtmlResponse
	{
		return new HtmlResponse(null, 'home/license.php');
	}

	public static function getDownloadsModel() : Downloads
	{
		// open the files dir, and scan
		$d = dir(dirname(__DIR__, 2) . '/html/files' );

		$files = [];

		while (false !== ($entry = $d->read())) {
			if (preg_match( '@^xdebug-([12]\.[0-9]\.[0-9].*?)\.tgz$@', $entry, $m)) {
				$files[$m[1]]['source'] = $entry;
			}
			if (preg_match( '@^php_xdebug-(2\.[0-9]\.[0-9].*?)-[4567]\.[0-9](\.[0-9])?(-v[cs](?>6|9|11|14|15|16))?(-nts)?(-(x86|x86_64))?\.dll$@', $entry, $m)) {
				$files[$m[1]]['dll'][] = $entry;
			}
		}

		uksort($files, 'version_compare');

		$files = array_reverse($files);

		$downloads = [];

		foreach ($files as $version => $tar) {
			$f = stat( "files/{$tar['source']}" );
			$hash = hash_file( "sha256", "files/{$tar['source']}" );
			$date = (new \DateTimeImmutable)->setTimestamp($f['mtime']);
			$href = 'files/' . $tar['source'];

			$dlls = [];

			if (isset( $tar['dll'] )) {
				$links = [];

				natsort($tar['dll']);

				foreach ($tar['dll'] as $dls) {
					$s = stat( "files/$dls" );
					$dll_hash = hash_file( 'sha256', "files/$dls" );
					preg_match( '@^php_xdebug-2\.[0-9]\.[0-9].*?-([4567]\.[0-9])(\.[0-9])?(-(v[cs](?>6|9|11|14|15|16)))?(-nts)?(-(x86|x86_64))?\.dll$@', $dls, $m);
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

	public static function download() : HtmlResponse
	{
		return new HtmlResponse(
			\XdebugDotOrg\Core\ContentsCache::fetchModel(
				Downloads::class,
				function() : Downloads {
					return self::getDownloadsModel();
				},
				'downloads'
			),
			'home/download.php'
		);
	}

	public static function contributing() : HtmlResponse
	{
		return new HtmlResponse(null, 'home/contributing.php');
	}
}
?>
