<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\WizardResult
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Installation instructions result');
?>

<h1>Installation Wizard</h1>

<?= XdebugDotOrg\Controller\TemplateController::default_menu()->render() ?>

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
		 - Compiler: MS VC <?= $this->x->winCompiler ?>
		 - Architecture: <?= $this->x->architecture ?>
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
	<li><b>Extensions directory:</b> <?= $this->x->extensionDir ?></li>
</ul>

<?php
$dlFile = $this->x->determineFile();
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

	<?php if ( $this->x->configPath ) : ?>
		<li>
			<?php if ($this->x->configFile) : ?>
				<?php if ($this->x->xdebugVersion) : ?>
					Update <code><?= $this->x->configFile ?></code>
				<?php else : ?>
					Edit <code><?= $this->x->configFile ?></code> <?= $this->x->configPath . $this->x->dirSep ?>php.ini</code>
				<?php endif ?>
			<?php else : ?>
				<?php if ($this->x->windows) : ?>
					Create <code>php.ini</code> in the same folder as where <code>php.exe</code> is
				<?php else : ?>
					Create <code><?= $this->x->configPath . $this->x->dirSep ?>php.ini</code>
				<?php endif ?>
			<?php endif ?>
		 and <?= $this->x->xdebugVersion ? "change " : ( $this->x->zendServer ? "add at the begining of the file " : "add " ) ?>
		the line<br/><code><?= $iniLine ?></code>

		<?php if ($this->x->opcacheLoaded) : ?>
			<br/>Make sure that <code><?= $iniLine ?></code> is <b>below</b> the line for OPcache.
		<?php endif ?>
		</li>
	<?php endif ?>

	<?php if ($this->x->sapi !== 'Command Line Interface') : ?>
		<li>Restart the webserver</li>
	<?php endif ?>
</ol>
