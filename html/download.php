<?php $title = "Xdebug: Downloads"; include "include/header.php"; hits ('xdebug-downloads'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOWNLOADS</span><br />

<?php include "include/menu.php"; ?>

<div style="float: right; width: 200px; border: solid green 1px; margin-right: 20px; padding: 10px;">
<img src="/images/xdebug-logo.png" alt="logo"/>
<p style="text-align: center;">
If you like Xdebug, please consider a <a href="/donate.php">donation</a>.
</p>
</div>

<h2>Source</h2>

<p>
The Xdebug extension helps you debugging your script by providing a lot of
valuable debug information. The debug information that Xdebug can
provide includes the following:
</p>

<p>Xdebug is hosted in SVN. The source code can be browsed through <a
href='http://svn.xdebug.org/cgi-bin/viewvc.cgi/xdebug/?root=xdebug'>ViewVC</a> and can be checkout with:
</p>
<pre>
svn co svn://svn.xdebug.org/svn/xdebug/xdebug/trunk xdebug
</pre>


<h2>Releases</h2>

<p>The Windows binaries generally work for every mini release for the mentioned
PHP version, although the extension is built against the most current PHP
version at that time. The VC<i>x</i> marker tells with which compiler the
extension was built, and Non-thread-safe whether ZTS was disabled. Those
qualifiers need to match the PHP version you're using.</p>

<?php
// open the files dir, and scan
$d = Dir( 'files' );
$files = array();
while ( false !== ( $entry = $d->read() ) )
{
	if (preg_match( '@^xdebug-([12]\.[0-9]\.[0-9].*?)\.tgz$@', $entry, $m)) {
		$files[strtolower($m[1])]['source'] = $entry;
	}
	if (preg_match( '@^php_xdebug-(2\.[0-9]\.[0-9].*?)-[456]\.[0-9](\.[0-9])?(-vc[69])?(-nts)?(-(x86|x86_64))?\.dll$@', $entry, $m)) {
		$files[strtolower($m[1])]['dll'][] = $entry;
	}
}
ksort( $files );
?>
<?php
	foreach( array_reverse( $files ) as $version => $tar ) {
		echo "<strong>Xdebug {$version}";
		$f = stat( "files/{$tar['source']}" );
		$d = date( 'Y-m-d', $f['mtime'] );
		echo "<div class='copy'>Release date: $d</div></strong>\n";
		echo "<ul>";
		echo "<li><a href='files/{$tar['source']}'>source</a></li>";
		if (isset( $tar['dll'] )) {
			echo "<li>Windows binaries: ";
			$links = array();
			sort( $tar['dll'] );
			foreach( $tar['dll'] as $dls ) {
				$s = stat( "files/$dls" );
				preg_match( '@^php_xdebug-2\.[0-9]\.[0-9].*?-([456]\.[0-9])(\.[0-9])?(-(vc[69]))?(-nts)?(-(x86|x86_64))?\.dll$@', $dls, $m);
				$name = $m[1];
				$namea = '';
				if (isset($m[4]) && $m[4] != '') {
					$namea .= strtoupper( " {$m[4]}" );
				} else {
					$namea = ' VC6';
				}

				if (isset($m[5]) && $m[5] == '-nts') {
					$namea .= " Non-thread-safe";
				}

				if (isset($m[7]) && $m[7] == 'x86_64') {
					$namea .= " (64 bit)";
				} else {
					$namea .= " (32 bit)";
				}
				$links[] = "<a href='files/{$dls}'>$name$namea</a>";
			}
			echo join( ', ', $links );
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
