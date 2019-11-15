<?php
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Support — Tailored Installation Instructions');
?>

<h1>Installation Wizard</h1>

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
	instructions.  You can see the code <a href='https://github.com/xdebug/xdebug.org/blob/master/src/XdebugVersion.php'>here</a>.
</p>
<p>
	<input type='submit' name='submit' value='Analyse my phpinfo() output'/>
</p>
</form>
