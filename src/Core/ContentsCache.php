<?php
namespace XdebugDotOrg\Core;

class ContentsCache
{
	/**
	 * @template T
	 * @param  class-string<T> $modelClass
	 * @param  \Closure():T   $callback
	 * @return T
	 */
	static public function fetchModel(string $modelClass, \Closure $callback, string $cache_id, int $expiryS = 3600) : object
	{
		$cache_directory = dirname(__DIR__, 2) . '/cache';
		$cache_file = $cache_directory . '/' . $cache_id;

		if (!file_exists($cache_directory)) {
			@mkdir($cache_directory, 0700, true);
		}

		$stat = @stat($cache_file);
		if ($stat) {
			if (time() <= $stat['ctime'] + $expiryS) {
				$serialized_contents = file_get_contents($cache_file);
				if ($serialized_contents) {
					$contents = unserialize($serialized_contents);

					if (get_class($contents) === $modelClass) {
						return $contents;
					}
				}
			}
		}

		$contents = $callback();

		if (file_exists($cache_directory)) {
			file_put_contents($cache_file, serialize($contents));
		}

		return $contents;
	}
}
?>
