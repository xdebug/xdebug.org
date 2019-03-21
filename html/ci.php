<?php $title = "Xdebug - Debugger and Profiler Tool for PHP"; include "include/header.php"; ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans"><a href='/ci.php'>XDEBUG CI</a></span><br />
<br/><br/>
<?php
include 'ci-items.php';

if ( isset( $_GET['r'] ) )
{
	ci::showRunInfo( (string) $_GET['r'] );
}
else
{
	ci::showMatrix();
}
?>
<!-- MAIN FEATURE END -->

			</td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
