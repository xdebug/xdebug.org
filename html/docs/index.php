<?php
ob_start();
	$title = "Xdebug: Documentation";

	ini_set( 'include_path', dirname(__FILE__) . '/..' );
	include 'docs/include/basic.php';
	include 'docs/include/settings.php';
	include 'docs/include/functions.php';
	include 'docs/include/features.php';
	include "include/header.php";

	hits('xdebug-docs');
?>
		<tr>
			<td>&nbsp;</td>
			<td><span class='serif'>
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOCUMENTATION</span><br />

<?php
$no_page_selected = true;
$load_page = '';

if ( isset( $_GET['action'] ) )
{
	$action = preg_replace( '/[^a-z0-9_]/', '', $_GET['action'] );
	switch ( $action )
	{
		case 'install':
		case 'basic':
		case 'display':
		case 'stack_trace':
		case 'execution_trace':
		case 'profiler':
		case 'remote':
		case 'code_coverage':
		case 'faq':
			$no_page_selected = false;
			$load_page = $action;
	}

}
?>
<div id="menu">
<?php include "include/menu-docs.php"; ?>
<?php
	if ( $load_page !== '' )
	{
		$feature = $features[$load_page];
		echo "<p class='intro'>{$feature[2]}</p>\n";
		echo "<hr class='light'/>\n";
		echo add_links( $feature[3] ). "\n";
		echo "<hr />\n";
		do_related_settings( $feature[1] );
		echo "<hr />\n";
		do_related_functions( $feature[1] );
		echo "<hr />\n";
	}
	else
	{
		$c = false;
		foreach( $features as $name => $feature )
		{
			if ( $c !== false )
				echo "<hr class='light'/>\n";
			else
				$c = true;
echo <<<END
» <a href='/docs/$name'>{$feature[0]}</a><br />
<p class="shortdesc">
{$feature[2]}
</p>
END;
		}
echo <<<END
<hr />
» <a href='/docs/all_settings'>All Configuration Settings</a><br />
» <a href='/docs/all_functions'>All Functions</a><br />
<hr />
END;
	}
?>
</div>
<!-- MAIN FEATURE END -->
			</span></td>
			<td>&nbsp;</td>
			<td>
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td>
<?php include "include/side.php"; ?>
						</td>
					</tr>
				</table>
			</td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>

