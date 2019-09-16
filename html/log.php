<?php $title = "Xdebug: Log"; include "include/header.php"; require 'include/report.php'; ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<h1>Log and Supporters Xdebug</h1>

<?php include "include/menu-support.php"; ?>

<div class="left">
<?php
$d = Dir( 'reports' );
$files = array();
while ( false !== ( $entry = $d->read() ) )
{
	if (preg_match( '@^20[0-9][0-9]-[01][0-9]\.txt$@', $entry, $m)) {
		$files[] = $entry;
	}
}
rsort($files);

foreach ($files as $file)
{
	show_report( $file );
	echo "<br/>\n";
}
?>
</div>
<div class="right">
<h2>Current Supporters</h2>
<?php
show_supporters()
?>
<p>You can also be listed as a supporter by <a href='/support.php'>signing up</a> for a <i>Company</i> package.</p>
</div>

<!-- MAIN FEATURE END -->

			</td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
