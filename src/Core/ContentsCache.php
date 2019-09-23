<?php
namespace XdebugDotOrg\Core;

class ContentsCache
{
	static public function fetch(\Closure $callback, string $cache_id, int $expiryS = 3600)
	{
		$cache_directory = dirname(__DIR__, 2) . '/cache';
		$cache_file = $cache_directory . '/' . $cache_id;

		if (!file_exists($cache_directory)) {
			@mkdir($cache_directory, 0700);
		}

		$stat = @stat($cache_file);
		if ($stat) {
			if (time() <= $stat['ctime'] + $expiryS) {
				return file_get_contents($cache_file);
			}
		}

		$contents = $callback();

		file_put_contents($cache_file, $contents);

		return $contents;
	}
}
?>
