<?php $title = "Xdebug: Downloads"; include "include/header.php"; hits ('xdebug-downloads'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOWNLOADS</span><br />

<?php include "include/menu.php"; ?>

<h2>Source</h2>

<p>Xdebug is hosted in CVS. The source code can be browsed through <a
href='http://cvs.xdebug.org/cgi-bin/viewvc.cgi/xdebug/'>ViewVC</a> and can be checkout with:
</p>
<pre>
cvs -d :pserver:srmread@cvs.xdebug.org:/repository login
# password= srmread
cvs -d :pserver:srmread@cvs.xdebug.org:/repository co xdebug
</pre>
<p>You can also checkout the 2.0 branch with:</p>
<pre>
cvs -d :pserver:srmread@cvs.xdebug.org:/repository co xdebug_2_0
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
	if (preg_match( '@^xdebug-([12]\.[0-9]\.[0-9])\.tgz$@', $entry, $m)) {
		$files[$m[1]]['source'] = $entry;
	}
	if (preg_match( '@^php_xdebug-(2\.[0-9]\.[0-9])-[456]\.[0-9]\.[0-9](-vc[69])?(-nts)?\.dll$@', $entry, $m)) {
		$files[$m[1]]['dll'][] = $entry;
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
				preg_match( '@^php_xdebug-2\.[0-9]\.[0-9]-([456]\.[0-9])\.[0-9](-(vc[69]))?(-nts)?\.dll$@', $dls, $m);
				$name = $m[1];
				$namea = '';
				if (isset($m[3]) && $m[3] != '') {
					$namea .= strtoupper( " {$m[3]}" );
				} else {
					$namea = ' VC6';
				}

				if (isset($m[4])) {
					$namea .= " Non-thread-safe";
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
