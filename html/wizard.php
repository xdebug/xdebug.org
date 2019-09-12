<?php $title = "Xdebug: Support — Tailored Installation Instructions"; include "include/header.php"; ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<h1>Installation Wizard</h1>

<?php include "include/menu.php"; ?>

<?php
if ( $_POST && isset( $_POST['submit'] ) && $_POST['submit'] == 'Analyse my phpinfo() output' && isset( $_POST['data'] ) )
{
	require 'include/phpinfo-scanner.php';

	$x = new xdebugVersion();
	$x->analyse( $_POST['data'] );

	if ( ( $reason = $x->determineSupported() ) !== true )
	{
		echo "<h2>{$reason}</h2>\n";
		echo <<<END
<p>
The wizard could not help in your situation, so please read the installation
<a href="/docs/install">documentation</a>. If the wizard indicated that your
current PHP version is not supported, please see whether there is a file
available for download or compilation on the <a href="/download.php">download</a>
page.
</p>
END;
	}
	else
	{
		$dlFile = $x->determineFile();
		$iniFile = $x->determineIniFile();
		$iniLine = $x->determineIniLine();

		// add quotes when necessary
		$x->extensionDir = strpos( $x->extensionDir, ' ') === false ? $x->extensionDir : "\"{$x->extensionDir}\"";

		if ( $x->xdebugAsPhpExt && !$x->xdebugAsZendExt )
		{
			echo "<h2>Instructions</h2>\n";

			echo "<p><span style='color: #f00'><b>Warning:</b></span> You seem to have Xdebug loaded as a normal
				PHP extension only. This will cause odd issues, please see <a href='/docs/faq#php-ext'>the FAQ entry on it</a>.</p>\n";
		}
		else if ( $x->xdebugVersion && version_compare( $x->xdebugVersion, $x->xdebugVersionToInstall, '>=' ) )
		{
			echo "<h2>You're already running the latest Xdebug version</h2>\n";
			echo "<p>But here are the instructions anyway:</p>\n";
		}
		else
		{
			echo "<h2>Instructions</h2>\n";

			if ( $x->zendServer )
			{
				echo "<p><span style='color: #f00'><b>Warning:</b></span> You
					seem to be using Zend Server, which is known to cause
					issues with Xdebug. It might work, but you're on your
					own.</p>\n";
			}
		}

		echo "<ol>\n";
		echo "<li>Download <a href='http://xdebug.org/files/{$dlFile}'>{$dlFile}</a></li>\n";
		if ( !$x->windows )
		{
			echo "<li>Install the pre-requisites for compiling PHP extensions.";
			if ( $x->distribution == 'Debian' || $x->distribution == 'Ubuntu' )
			{
				echo "<br />On your {$x->distribution} system, install them with: <code>apt-get install php-dev autoconf automake</code>";
			}
			else if ( $x->distribution == 'RedHat' || $x->distribution == 'Fedora' )
			{
				echo "<br />On your {$x->distribution} system, install them with: <code>yum groupinstall \"Development tools\" && yum install php-devel autoconf automake</code>";
			}
			else if ( $x->distribution == 'Darwin' )
			{
				echo "<br />On your Mac, we only support installations with 'homebrew', and <code>brew install php && brew install autoconf</code> should pull in the right packages.";
			}
			else
			{
				echo " These packages are often called 'php-dev', or 'php-devel', 'automake' and 'autoconf'.";
			}
			echo "</li>";
			echo "<li>Unpack the downloaded file with <code>tar -xvzf {$dlFile}</code></li>";
			echo "<li>Run: <code>cd {$x->tarDir}</code></li>\n";
			echo "<li><p>Run: <code>phpize</code> (See the <a href='/docs/faq#phpize'>FAQ</a> if you don't have <code>phpize</code>).</p>
<p>As part of its output it should show:<br/><pre>
Configuring for:
...
Zend Module Api No:      {$x->phpApi}
Zend Extension Api No:   {$x->zendApi}
</pre></p>
<p>If it does not, you are using the wrong <code>phpize</code>. Please follow
<a href='/docs/faq#custom-phpize'>this FAQ entry</a> and skip the next step.
</p>\n";
			echo "<li>Run: <code>./configure</code></li>\n";
			echo "<li>Run: <code>make</code></li>\n";
			echo "<li>Run: <code>cp modules/xdebug.so {$x->extensionDir}</code></li>\n";
		}
		else
		{
			echo "<li>Move the downloaded file to {$x->extensionDir}</li>\n";
		}
		if ( $x->zendServer )
		{
			$file = $x->windows
				? "{$x->zendServerInstallPath}{$x->dirSep}etc{$x->dirSep}cfg{$x->dirSep}debugger.ini"
				: "{$x->zendServerInstallPath}{$x->dirSep}etc{$x->dirSep}conf.d{$x->dirSep}debugger.ini";
			echo "<li>Open <code>$file</code>\n";
			echo "and put a <code>;</code> in front of the line that says <code>zend_extension_manager.dir.debugger=</code>\n";
			echo "so that it says <code>;zend_extension_manager.dir.debugger=</code></li>\n";
		}
		echo "<li>{$iniFile} and ";
		echo $x->xdebugVersion ? "change " : ( $x->zendServer ? "add at the begining of the file " : "add " );
		echo "the line<br/><code>{$iniLine}</code>";
		if ( $x->opcacheLoaded )
		{
			echo "<br/>Make sure that <code>{$iniLine}</code> is <b>below</b> the line for OPcache.\n";
		}
		echo "\n</li>\n";
		if ( $x->sapi !== 'Command Line Interface' )
		{
			echo "<li>Restart the webserver</li>\n";
		}
		echo "</ol>\n";
	}
	echo "<p>\n\tIf you like Xdebug, and thinks it saves you time and money, please have a look at the <a href='/donate.php'>donation</a> page.\n</p>\n";
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
<form method='POST'>
<p>
	<textarea name='data' cols="80" rows="25"></textarea>
</p>
<p>
	The information that you upload will not be stored. The script will only
	use a few regular expressions to analyse the output and provide you with
	instructions.  You can see the code <a href='https://github.com/derickr/xdebug.org/blob/master/html/include/phpinfo-scanner.php'>here</a>.
</p>
<p>
	<input type='submit' name='submit' value='Analyse my phpinfo() output'/>
</p>
	</form>
<?php
}
?>
<!-- MAIN FEATURE END -->

			</td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
