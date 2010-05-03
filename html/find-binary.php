<?php $title = "Xdebug: Support; Tailored Installation Instructions"; include "include/header.php"; hits ('xdebug-findbinary'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOCUMENTATION | INSTALLATION</span><br />

<?php include "include/menu.php"; ?>

<h2>Tailored Installation Instructions</h2>

<?php
if ( $_POST && isset( $_POST['submit'] ) && $_POST['submit'] == 'Analyse my phpinfo() output' && isset( $_POST['data'] ) )
{
	require 'include/phpinfo-scanner.php';

	$x = new xdebugVersion();
	$x->analyse( $_POST['data'] );

	if ( ( $reason = $x->determineSupported() ) !== true )
	{
		echo "<h2>{$reason}</h2>\n";
	}
	else
	{
		$dlFile = $x->determineFile();
		$iniFile = $x->determineIniFile();
		$iniLine = $x->determineIniLine();

		if ( $x->xdebugVersion && version_compare( $x->xdebugVersion, $x->xdebugVersionToInstall, '>=' ) )
		{
			echo "<h2>You're already running the latest Xdebug version</h2>\n";
			echo "<p>But here are the instructions anyway:</p>\n";
		}
		else
		{
			echo "<h2>Instructions</h2>\n";
		}

		echo "<ol>\n";
		echo "<li>Download <a href='http://xdebug.org/files/{$dlFile}'>{$dlFile}</a></li>\n";
		if ( !$x->windows )
		{
			echo "<li>Unpack the downloaded file with <code>tar -xvzf {$dlFile}</code></li>";
			echo "<li>Run: <code>cd {$x->tarDir}</code></li>\n";
			echo "<li><p>Run: <code>phpize</code></p>
<p>As part of its output it should show:<br/><pre>
Configuring for:
PHP Api Version:         {$x->phpApi}
...
Zend Extension Api No:   {$x->zendApi}
</pre></p>
<p>If it does not, you are using the wrong <code>phpize</code>. Please follow
<a href='/docs/faq#custom-phpize'>this FAQ entry</a> and skip the next step.
</p>\n";
			echo "<li>Run: <code>./configure</code></li>\n";
			echo "<li>Run: <code>make</code></li>\n";
			echo "<li>Run: <code>make install</code></li>\n";
		}
		else
		{
			echo "<li>Move the downloaded file to {$x->extensionDir}</li>\n";
		}
		echo "<li>{$iniFile} and ";
		echo $x->xdebugVersion ? "change " : "add ";
		echo "the line<br/><code>{$iniLine}</code></li>\n";
		if ( $x->sapi !== 'Command Line Interface' )
		{
			echo "<li>Restart the webserver</li>\n";
		}
		echo "</ol>\n";
	}
}
else
{
?>
<p>
	This page helps you finding which file to download, and how to configure
	PHP to get Xdebug running.  Please paste the <b>full</b> output of
	phpinfo() (either a copy &amp; paste of the HTML version, the HTML source
	or <code>php -i</code> output) and submit the form to receive tailored
	download and installation instructions.
</p>
<p>
	<form method='POST'>
	<textarea name='data' cols="80" rows="25">
	</textarea>
	<br/>
	<input type='submit' name='submit' value='Analyse my phpinfo() output'/>
	</form>
</p>
<?php
}
?>
<!-- MAIN FEATURE END -->

			</td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
