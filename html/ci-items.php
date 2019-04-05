<?php
class ci
{
	static function showRunInfo( string $runId )
	{
		$m = new \MongoDB\Driver\Manager( "mongodb+srv://ci-reader:{$_ENV['CIREADPASSWORD']}@xdebugci-qftmo.mongodb.net/test?retryWrites=true" );

		$query = new \MongoDB\Driver\Query( [ '_id' => $runId ] );
		$result = $m->executeQuery( 'ci.run', $query );

		$result = iterator_to_array( $result );

		if ( count( $result ) != 1 )
		{
			echo <<<ENDERR
<h2 class='error'>There is no CI run with ID '$runId'</h2>
ENDERR;
			return;
		}

		$r = $result[0];

		/* Header */
		$time = (new \DateTime( "@{$r->ts}" ))->format( 'Y-m-d<\b\r/>H:i:s' );
		echo <<<ENDHEAD
<h2>CI Run '$runId'</h2>

<table class='ci'>
<tr class='version'>
	<th>PHP {$r->cfg->config}</th><th>Xdebug: <a href='https://github.com/xdebug/xdebug/commit/{$r->ref}'>{$r->abbrev}</a></th><th><div class='time'>{$time}</div></th>
</tr>
</table>
ENDHEAD;

		if ( $r->buildSuccess == false )
		{
			$log = htmlspecialchars( $r->buildLog );
			echo <<<ENDFAIL
<h2 class='bf'>Build Failure</h2>

<pre class='log'>
{$log}
</pre>
ENDFAIL;
			return;
		}
			
		echo <<<ENDSUCCESS
<h2 class='success'>Build Success</h2>

<table class='ci'>
<tr class='version'>
	<th>Tests</th><th>Errors</th><th>Failures</th><th>Skipped</th><th>Time</th>
</tr>
<tr>
	<td>{$r->stats->tests}</td><td>{$r->stats->errors}</td><td>{$r->stats->failures}</td><td>{$r->stats->skip}</td><td><div class='time'>{$r->stats->time} s</div></th>
</tr>
</table>
ENDSUCCESS;

		if ( $r->stats->errors == 0 && $r->stats->failures == 0 )
		{
		echo <<<TESTSUCCESS
<h2 class='success'>Test Success</h2>
TESTSUCCESS;
			return;
		}
		
	echo <<<TESTFAILURE
<h2 class='err'>Test Failure</h2>
TESTFAILURE;

	foreach( $r->failures as $f )
	{
		$log = htmlspecialchars( $f->reason );
		echo <<<ENDFAILURE
<table class='ci'>
<tr class='version'>
	<th>File: <a href='https://github.com/xdebug/xdebug/blob/{$r->ref}/tests/{$f->file}.phpt'>tests/{$f->file}.phpt</a></th>
</tr>
<tr>
	<td>{$f->desc}</td>
</tr>
<tr>
	<td><pre class='log'>{$log}</pre></td>
</tr>
</table>
ENDFAILURE;
}
	}

	static function showMatrix()
	{
		$m = new \MongoDB\Driver\Manager( "mongodb+srv://ci-reader:{$_ENV['CIREADPASSWORD']}@xdebugci-qftmo.mongodb.net/test?retryWrites=true" );

		$query = new \MongoDB\Driver\Command( [
			'aggregate' => 'run',
			'pipeline' => [
				[ '$group' => [ '_id' => '$run', 'docs' => [ '$push' => '$$ROOT' ] ] ],
				[ '$sort' => [ '_id' => -1 ] ],
				[ '$limit' => 100 ],
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

		/* Figure out which versions we have */
		foreach ( $runs as $run => $info )
		{
			foreach ( $info as $key => $version )
			{
				$phpVersions[ $version->cfg->config ] = true;
				$latestAbbrev = trim( $version->run );
				$abbrevs[ $latestAbbrev ] = $version;
				if ( !isset( $matrix[ trim( $latestAbbrev ) ][ trim( $version->cfg->config ) ] ) )
				{
					$matrix[ trim( $latestAbbrev ) ][ trim( $version->cfg->config ) ] = $version;
				}
			}
		}


		$phpVersions = array_keys( $phpVersions );

		uksort( $abbrevs, function( $aIndex, $bIndex ) use ( $abbrevs ) {
			return $abbrevs[$aIndex]->ts <=> $abbrevs[$bIndex]->ts;
		} );
		$abbrevs = array_reverse( $abbrevs );
		$abbrevs = array_slice( $abbrevs, 0, 8 );

		uksort( $phpVersions, function($aIndex, $bIndex) use ( $phpVersions ) {
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

			return strcmp( $aMatch[3], $bMatch[3] );
		} );

		$phpVersions = array_values( $phpVersions );

		echo "<table class='ci'>\n\t<tr class='version'><th></th>\n";

		foreach ( $abbrevs as $abbrev => $version )
		{
			$time = (new \DateTime( "@{$version->ts}" ))->format( 'Y-m-d<\b\r/>H:i:s' );
			if ( preg_match('@(.*)-g([0-9a-f]+)$@', $version->abbrev, $m) )
			{
				echo "\t\t<th><div><a href='https://github.com/xdebug/xdebug/commit/{$m[2]}'>{$m[1]}</a><br/><div class='time'>{$time}</div></th>\n";
				continue;
			}
				
			echo "\t\t<th><div><a href='https://github.com/xdebug/xdebug/commit/{$version->ref}'>{$abbrev}</a><br/><div class='time'>{$time}</div></th>\n";
		}
		echo "\t</tr>\n";

		foreach ( $phpVersions as $version )
		{
			/* Check whether there are any non-missing items */
			$found = false;
			foreach ( $abbrevs as $abbrev => $ref )
			{
				if ( isset( $matrix[$abbrev][$version] ) ) {
					$found = true;
					break;
				}
			}
			if ( ! $found )
			{
				continue;
			}

			echo "\t\t<tr><th>{$version}</div></th>\n";

			foreach ( $abbrevs as $abbrev => $ref )
			{
				if ( !isset( $matrix[$abbrev][$version] ) )
				{
					echo "<td class='missing'></td>\n";
					continue;
				}
				$v = $matrix[$abbrev][$version];

				if ( $v->buildSuccess != true )
				{
					echo "<td class='bf'><a href='/ci.php?r={$v->_id}'>✖</a></td>\n";
					continue;
				}

				if ( $v->stats->errors != 0 || $v->stats->failures != 0 )
				{
					echo "<td class='err'><a href='/ci.php?r={$v->_id}'>✖</a></td>\n";
					continue;
				}

				echo "<td class='success'><a href='/ci.php?r={$v->_id}'>✔</a></td>\n";
			}
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
}
