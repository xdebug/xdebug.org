<?php $title = "Xdebug: Downloads"; include "include/header.php"; ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOWNLOADS</span><br />

<?php include "include/menu.php"; ?>

<h2>Source</h2>

<p>
The Xdebug extension helps you debugging your script by providing a lot of
valuable debug information. The debug information that Xdebug can
provide includes the following:
</p>

<p>Xdebug is hosted in GIT. The source code can be browsed through <a
href='https://github.com/xdebug/xdebug'>github</a> and can be checked out with:
</p>
<pre>
git clone git://github.com/xdebug/xdebug.git
</pre>

<a name='releases'></a>
<h2>Releases</h2>

<p>The Windows binaries generally work for every mini release for the mentioned
PHP version, although the extension is built against the most current PHP
version at that time. The VC<i>x</i> marker tells with which compiler the
extension was built, and Non-thread-safe whether ZTS was disabled. Those
qualifiers need to match the PHP version you're using. If you don't know which
one you need, please refer to the <a href='/wizard.php'>custom
installation instructions</a>.</p>

<?php
// open the files dir, and scan
$d = Dir( 'files' );
$files = array();
while ( false !== ( $entry = $d->read() ) )
{
	if (preg_match( '@^xdebug-([12]\.[0-9]\.[0-9].*?)\.tgz$@', $entry, $m)) {
		$files[strtolower($m[1])]['source'] = $entry;
	}
	if (preg_match( '@^php_xdebug-(2\.[0-9]\.[0-9].*?)-[4567]\.[0-9](\.[0-9])?(-vc(?>6|9|11|14|15))?(-nts)?(-(x86|x86_64))?\.dll$@', $entry, $m)) {
		$files[strtolower($m[1])]['dll'][] = $entry;
	}
}
uksort( $files, 'version_compare' );
?>
<?php
	foreach( array_reverse( $files ) as $version => $tar ) {
		echo "<strong>Xdebug {$version}";
		$f = stat( "files/{$tar['source']}" );
		$hash = hash_file( "sha256", "files/{$tar['source']}" );
		$d = date( 'Y-m-d', $f['mtime'] );
		echo "<div class='copy'>Release date: $d</div></strong>\n";
		echo "<ul>";
		echo "<li><a href='files/{$tar['source']}'>source</a> <span class='md5'>(SHA256: $hash)</span></li>";
		if (isset( $tar['dll'] )) {
			echo "<li>Windows binaries:<br/>";
			$links = array();
			natsort( $tar['dll'] );
			foreach( $tar['dll'] as $dls ) {
				$s = stat( "files/$dls" );
				$hash = hash_file( 'sha256', "files/$dls" );
				preg_match( '@^php_xdebug-2\.[0-9]\.[0-9].*?-([4567]\.[0-9])(\.[0-9])?(-(vc(?>6|9|11|14|15)))?(-nts)?(-(x86|x86_64))?\.dll$@', $dls, $m);
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
				$links[] = "<a href='files/{$dls}'>PHP $name$namea</a> <span class='md5'>(SHA256: $hash)</span>";
			}
			echo join( '<br /> ', $links );
		}
		echo "</ul>";
	}
?>
</ul>
<!-- MAIN FEATURE END -->

			</span></td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
