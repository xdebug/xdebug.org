<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\WizardResult
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Installation instructions result');
?>

<h1>Installation Wizard</h1>

<h2>Summary</h2>
<ul>
	<?php if ( $this->x->xdebugAsZendExt && $this->x->xdebugVersion) : ?>
		<li><b>Xdebug installed:</b> <?= $this->x->xdebugVersion ?></li>
	<?php elseif ( $this->x->xdebugAsPhpExt ) : ?>
		<li><b>Xdebug installed:</b> <span style='color: #f00'>Only as PHP extension!</span></li>
	<?php else : ?>
		<li><b>Xdebug installed:</b> no</li>
	<?php endif ?>
	<li><b>Server API:</b> <?= $this->x->sapi ?: 'not found' ?></li>
	<li><b>Windows:</b> <?= $this->x->windows ? 'yes' : 'no' ?>
	<?php if ( $this->x->windows ) : ?>
		<li><b>Compiler:</b> MS <?= $this->x->winCompiler >= 16 ? 'VS' : 'VC' ?><?= $this->x->winCompiler ?></li>
		<li><b>Architecture:</b> <?= $this->x->architecture ?></li>
	<?php endif ?>
	</li>
	<li><b>Zend Server:</b> <?= $this->x->zendServer ? 'yes' : 'no' ?>
	<?php if ( $this->x->zendServer ) : ?>
		 - Install path: <?= $this->x->zendServerInstallPath ?>
	<?php endif ?>
	</li>
	<li><b>PHP Version:</b> <?= $this->x->version ?></li>
	<li><b>Zend API nr:</b> <?= $this->x->zendApi ?: 'not found' ?></li>
	<li><b>PHP API nr:</b> <?= $this->x->phpApi ?: 'not found' ?></li>
	<li><b>Debug Build:</b> <?= $this->x->debug ? 'yes' : 'no' ?></li>
	<li><b>Thread Safe Build:</b> <?= $this->x->ts ? 'yes' : 'no' ?></li>
	<li><b>OPcache Loaded:</b> <?= $this->x->opcacheLoaded ? 'yes' : 'no' ?></li>
	<?php if ( $this->x->configPath ) : ?>
		<?php if ( $this->x->configFile ) : ?>
			<li><b>Configuration File Path:</b> <?= $this->x->configPath ?></li>
			<li><b>Configuration File:</b> <?= $this->x->configFile ?></li>
		<?php else : ?>
			<?php if ( $this->x->windows ) : ?>
				<li><b>Configuration File Path:</b> unknown</li>
				<li><b>Configuration File:</b> unknown</li>
			<?php else : ?>
				<li><b>Configuration File Path:</b> <?= $this->x->configPath ?></li>
				<li><b>Configuration File:</b> <?= $this->x->configPath ?>/php.ini</li>
			<?php endif ?>
		<?php endif ?>
	<?php endif ?>
	<?php if ( $this->x->configExtraPath ) : ?>
		<li><b>Extra Configuration Files Path:</b> <?= $this->x->configExtraPath ?></li>
	<?php endif ?>
	<?php if ( $this->x->configExtraFiles ) : ?>
		<li><b>Extra Configuration Files:</b><br/><?= join( "<br/>\n", $this->x->configExtraFiles ); ?></li>
	<?php endif ?>
	<li><b>Extensions directory:</b> <?= $this->x->extensionDir ?></li>
</ul>

<?php
$dlFile = $this->x->determineFile();
$iniFileInstruction = $this->x->determineIniFileInstruction( $iniFileName );
$iniLine = $this->x->determineIniLine();

// add quotes when necessary
$this->x->extensionDir = strpos( $this->x->extensionDir, ' ') === false ? $this->x->extensionDir : "\"{$this->x->extensionDir}\"";
?>

<?php if ($this->x->xdebugAsPhpExt && !$this->x->xdebugAsZendExt ) : ?>
	<h2>Instructions</h2>

	<p><span style='color: #f00'><b>Warning:</b></span> You seem to have Xdebug loaded as a normal
		PHP extension only. This will cause odd issues, please see <a href='/docs/faq#php-ext'>the FAQ entry on it</a>.</p>
<?php elseif ( $this->x->xdebugVersion && $this->x->xdebugVersionToInstall && version_compare( $this->x->xdebugVersion, $this->x->xdebugVersionToInstall, '>=' ) ) : ?>
	<h2>You're already running the latest Xdebug version</h2>
	<p>But here are the instructions anyway:</p>
<?php else : ?>
	<h2>Instructions</h2>

	<?php if ( $this->x->zendServer ) : ?>
		<p><span style='color: #f00'><b>Warning:</b></span> You
			seem to be using Zend Server, which is known to cause
			issues with Xdebug. It might work, but you're on your
			own.</p>
	<?php endif ?>
<?php endif ?>

<ol>
	<li>Download <a href='http://xdebug.org/files/<?= $dlFile ?>'><?= $dlFile ?></a></li>

	<?php if (!$this->x->windows) : ?>
		<li>Install the pre-requisites for compiling PHP extensions.

		<?php if ( $this->x->distribution == 'Debian' || $this->x->distribution == 'Ubuntu' ) : ?>
			<br />On your <?= $this->x->distribution ?> system, install them with: <code>apt-get install php-dev autoconf automake</code>
		<?php elseif ( $this->x->distribution == 'RedHat' || $this->x->distribution == 'Fedora' ) : ?>
			<br />On your <?= $this->x->distribution ?> system, install them with: <code>yum groupinstall "Development tools" && yum install php-devel autoconf automake</code>
		<?php elseif ( $this->x->distribution == 'Darwin' ) : ?>
			<br />On your Mac, we only support installations with 'homebrew', and <code>brew install php && brew install autoconf</code> should pull in the right packages.
		<?php else : ?>
			These packages are often called 'php-dev', or 'php-devel', 'automake' and 'autoconf'.
		<?php endif ?>
		</li>
		<li>Unpack the downloaded file with <code>tar -xvzf <?= $dlFile ?></code></li>
		<?php if ($this->x->tarDir && $this->x->phpApi && $this->x->zendApi ) : ?>
			<li>Run: <code>cd <?= $this->x->tarDir ?></code></li>
			<li>
				<p>Run: <code>phpize</code> (See the <a href='/docs/faq#phpize'>FAQ</a> if you don't have <code>phpize</code>).</p>
				<p>As part of its output it should show:<br/><pre>
Configuring for:
...
Zend Module Api No:      <?= $this->x->phpApi . "\n" ?>
Zend Extension Api No:   <?= $this->x->zendApi ?>
</pre>
				</p>
				<p>If it does not, you are using the wrong <code>phpize</code>. Please follow
					<a href='/docs/faq#custom-phpize'>this FAQ entry</a> and skip the next step.
				</p>
            </li>
            <li>Run: <code>./configure</code></li>
			<li>Run: <code>make</code></li>
			<li>Run: <code>cp modules/xdebug.so <?= $this->x->extensionDir ?></code></li>
		<?php endif ?>
	<?php else : ?>
		<li>Move the downloaded file to <?= $this->x->extensionDir ?></li>
	<?php endif ?>

	<?php if ($this->x->zendServer ) : ?>
		<li>Open <code><?= $this->x->windows
			? "{$this->x->zendServerInstallPath}{$this->x->dirSep}etc{$this->x->dirSep}cfg{$this->x->dirSep}debugger.ini"
			: "{$this->x->zendServerInstallPath}{$this->x->dirSep}etc{$this->x->dirSep}conf.d{$this->x->dirSep}debugger.ini" ?></code>
			and put a <code>;</code> in front of the line that says
			<code>zend_extension_manager.dir.debugger=</code>
			so that it says <code>;zend_extension_manager.dir.debugger=</code>
		</li>
	<?php endif ?>

	<li><?= $iniFileInstruction ?> the line:<br/><code><?= $iniLine ?></code>

	<?php if ($this->x->opcacheLoaded && $this->x->configExtraPath === false) : ?>
		<br/>Make sure that <code><?= $iniLine ?></code> is <b>below</b> the line for OPcache.
	<?php endif ?>
	</li>

	<?php if ($this->x->configFilePerSapi) : ?>
		<li>Please also update <code>php.ini</code> files in adjacent
		directories, as your system seems to be configured with a separate
		<code>php.ini</code> file for the web server and command line.</li>
	<?php endif ?>

	<?php if ($this->x->sapi === 'Apache 2.0 Handler') : ?>
		<li>Restart the Apache Webserver</li>
	<?php elseif ($this->x->sapi === 'FPM/FastCGI') : ?>
		<li>Restart PHP-FPM</li>
	<?php elseif ($this->x->sapi === 'Built-in HTTP server') : ?>
		<li>Restart PHP's built-in HTTP server (php -S)</li>
	<?php elseif ($this->x->sapi !== 'Command Line Interface') : ?>
		<li>Restart the webserver</li>
	<?php endif ?>
</ol>

<h2>Enabling Features</h2>

<p>Now Xdebug is installed, you can enable its features. Please refer to the
dedicated sections in the documentation about information on how to enable and
configure these Xdebug features.
<?php if ( $iniFileName ) : ?>
	Where these sections refer to <code>php.ini</code> or similar, please
	remember to use <code><?= $iniFileName ?></code>:</p>
<?php endif ?>

<ul>
	<li><a href='/docs/develop'>Development Helpers</a> — help you get better
	error messages and obtain better information from PHP's built-in
	functions.</li>
	<li><a href='/docs/step_debug'>Step Debugging</a> — allows you to
	interactively walk through your code to debug control flow and examine data
	structures.</li>
	<li><a href='/docs/profiler'>Profiling</a> — allows you to find
	bottlenecks in your script and visualize those with an external tool.</li>
</ul>
