<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;
use XdebugDotOrg\Model\CiMatrix;
use XdebugDotOrg\Model\CiRun;

class CiController
{
	public static function index() : HtmlResponse
	{
		if ( isset( $_GET['r'] ) ) {
			return self::run( (string) $_GET['r'] );
		}

		return self::matrix();
	}

	private static function fixFileNames( object $results ) : object
	{
		foreach ( $results->failures as $key => $failure )
		{
			$results->failures[$key]->file = str_replace( '.', '/', $results->failures[$key]->file );
		}

		return $results;
	}

	private static function run( string $runId ) : HtmlResponse
	{
		$m = new \MongoDB\Driver\Manager( "mongodb+srv://ci-reader:{$_ENV['CIREADPASSWORD']}@xdebugci-qftmo.mongodb.net/test?retryWrites=true" );

		$query = new \MongoDB\Driver\Query( [ '_id' => $runId ] );
		$result = $m->executeQuery( 'ci.run', $query );

		$result = iterator_to_array( $result );

		if ( count( $result ) != 1 )
		{
			throw new \Exception('There is no CI run with ID ' . $runId);
		}

		$r = self::fixFileNames( $result[0] );

		return new HtmlResponse(new CiRun($r, $runId), 'ci/run.php');
	}

	private static function matrix() : HtmlResponse
	{
		$m = new \MongoDB\Driver\Manager( "mongodb+srv://ci-reader:{$_ENV['CIREADPASSWORD']}@xdebugci-qftmo.mongodb.net/test?retryWrites=true" );

		$query = new \MongoDB\Driver\Command( [
			'aggregate' => 'run',
			'pipeline' => [
				[ '$match' => [ 'ts' => [ '$gt' => strtotime( '-2 weeks' ) ] ] ],
				[ '$sort' => [ '_id' => -1 ] ],
				[ '$project' => [
					'failures' => 0,
				] ],
				[ '$limit' => 10000 ],
				[ '$group' => [ '_id' => '$run', 'docs' => [ '$push' => '$$ROOT' ] ] ],
				[ '$sort' => [ '_id' => -1 ] ],
				[ '$limit' => 200 ],
			],
			'cursor' => (object) [],
		] );

		$phpVersions = [];
		$abbrevs     = [];
		$runs = [];

		foreach ( $m->executeCommand( 'ci', $query ) as $result )
		{
			$runs[$result->_id] = $result->docs;
		}

		$matrix = [];

		/* Figure out which versions we have */
		foreach ( $runs as $run => $info )
		{
			foreach ( $info as $key => $version )
			{
				$phpVersions[ $version->cfg->version ] = true;
				$latestAbbrev = trim( $version->run );
				$abbrevs[ $latestAbbrev ] = $version;
				if ( !isset( $matrix[ trim( $latestAbbrev ) ][ trim( $version->cfg->version )][ trim( $version->cfg->config ) ] ) )
				{
					$matrix[ trim( $latestAbbrev ) ][ trim( $version->cfg->version )][ trim( $version->cfg->config ) ] = $version;
				}
			}
		}


		$phpVersions = array_keys( $phpVersions );

		uksort(
			$abbrevs, function(string $aIndex, string $bIndex) use ( $abbrevs ) {
				return $abbrevs[$aIndex]->ts <=> $abbrevs[$bIndex]->ts;
			}
		);

		$abbrevs = array_reverse( $abbrevs );
		$abbrevs = array_slice( $abbrevs, 0, 7 );

		uksort(
			$phpVersions,
			function(int $aIndex, int $bIndex) use ( $phpVersions ) {
				$a = $phpVersions[ $aIndex ];
				$b = $phpVersions[ $bIndex ];
				preg_match( '@([^-]+)(-(32bit|zts))?$@', $a, $aMatch );
				preg_match( '@([^-]+)(-(32bit|zts))?$@', $b, $bMatch );

				if ( $aMatch[1] == 'master' || $bMatch[1] == 'master' )
				{
					if ( $aMatch[1] == $bMatch[1] )
					{
						$c = 0;
					}
					else if ( $aMatch[1] == 'master' )
					{
						$c = 1;
					}
					else
					{
						$c = -1;
					}
				}
				else
				{
					$c = version_compare( $aMatch[1], $bMatch[1] );
				}

				if ( $c != 0 )
				{
					return -$c;
				}

				return strcmp( isset( $aMatch[3] ) ? $aMatch[3] : '', isset( $bMatch[3] ) ? $bMatch[3] : '' );
			}
		);

		$filteredVersions = array_filter(
			array_values( $phpVersions ),
			function( $version ) use ($abbrevs, $matrix) {
				/* Check whether there are any non-missing items */
				foreach ( $abbrevs as $abbrev => $ref ) {
					if ( isset( $matrix[$abbrev][$version] ) ) {
						return true;
					}
				}

				return false;
			}
		);

		return new HtmlResponse(new CiMatrix($matrix, $filteredVersions, $abbrevs), 'ci/matrix.php');
	}
}
