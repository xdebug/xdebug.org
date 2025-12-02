<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Downloads
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Downloads');
?>

<h1>Downloads</h1>

<p>Please refer to the <a href="/docs/install">installation</a> instructions on
how to install Xdebug.</p>

<h2>Source</h2>

<p>Xdebug is hosted in GIT. The source code can be browsed through <a
href='https://github.com/xdebug/xdebug'>GitHub</a> and can be checked out with:
</p>
<pre>
git clone https://github.com/xdebug/xdebug.git
</pre>

<a name='releases'></a>

<a name='<?= preg_replace('/[^0-9A-Za-z]/', '_', (string) $this->downloads[0]->version) ?>'></a>
<h2>Latest Release</h2>
<strong>Xdebug <?= $this->downloads[0]->version ?></strong>
<div class='copy'>Release date: <?= $this->downloads[0]->date->format('Y-m-d') ?></div>

<div class="front_releases">
<?php foreach ($this->downloads as $download) : ?>
	<ul>
		<li>Linux, macOS:
			<ul class="releases">
				<li><a title="SHA256:&nbsp;<?= $download->hash ?>" href='/<?= $download->href ?>'>source</a></li>
			</ul>
		</li>
		<?php if ($download->dlls) : ?>
			<li>Windows binaries:<br/>

				<ul class="releases">
					<?php foreach ($download->dlls as $i => $dll) : ?>
						<li><a title="SHA256:&nbsp;<?= $dll['hash'] ?>" href='/<?= $dll['href'] ?>'>PHP <?= $dll['name'] ?></a></li>
					<?php endforeach ?>
				</ul>

			</li>
		<?php endif ?>
	</ul>
<?php endforeach ?>
</div>

<?php if (array_key_exists(1, $this->downloads)): ?>

<a name='<?= preg_replace('/[^0-9A-Za-z]/', '_', (string) $this->downloads[1]->version) ?>'></a>
<h2>Latest Pre-Release</h2>
<strong>Xdebug <?= $this->downloads[1]->version ?></strong>
<div class='copy'>Release date: <?= $this->downloads[1]->date->format('Y-m-d') ?></div>

<div class="front_releases">
<?php foreach ($this->downloads as $download) : ?>
	<ul>
		<li>Linux, macOS:
			<ul class="releases">
				<li><a title="SHA256:&nbsp;<?= $download->hash ?>" href='/<?= $download->href ?>'>source</a></li>
			</ul>
		</li>
		<?php if ($download->dlls) : ?>
			<li>Windows binaries:<br/>

				<ul class="releases">
					<?php foreach ($download->dlls as $i => $dll) : ?>
						<li><a title="SHA256:&nbsp;<?= $dll['hash'] ?>" href='/<?= $dll['href'] ?>'>PHP <?= $dll['name'] ?></a></li>
					<?php endforeach ?>
				</ul>

			</li>
		<?php endif ?>
	</ul>
<?php endforeach ?>
</div>

<?php endif ?>

<!-------------------------- -->

<a name='xdebugctl'></a>
<h2>Xdebug Control Tool</h2>

<p>
A tool to send commands to interact with Xdebug while a script is running. This
allows you to request process information, or instruct Xdebug to initiate a
debugging request, or breakpoint.
</p>
<p>
This binary may be used free of charge, but as-is and without warranty. Source
code is available on <a href='https://github.com/derickr/dbgp-tools/tree/master/xdebugctl'>GitHub</a>.
</p>

<div class="front_releases">
	<ul class="releases">
		<li><a title="Linux" href="/files/binaries/xdebugctl">Linux (x86_64)</a></title>
		<li><a title="Linux-ARM" href="/files/binaries/xdebugctl-arm64">Linux (arm64)</a></title>
		<li><a title="Windows" href="/files/binaries/xdebugctl.exe">Windows (x86_64)</a></title>
	</ul>
</div>
<p>Please refer to the <a href="/docs/xdebugctl">documentation</a> to learn
about how to use the Xdebug Control Tool.</p>

<!-------------------------- -->

<a name='dbgpProxy'></a>
<h2>DBGp Proxy</h2>

<p>
A proxy implementation for the DBGp protocol. For some situations, it allows
for multiple developers to debug their application in a shared remote server.
For more complex situations, <a href="https://xdebug.cloud">Xdebug Cloud</a>
provides a superior alternative.
</p>
<p>
This binary may be used free of charge, but as-is and without warranty. Source
code is available on <a href='https://github.com/derickr/dbgp-tools/tree/master/dbgpProxy'>GitHub</a>.
</p>

<div class="front_releases">
	<ul class="releases">
		<li><a title="Linux" href="/files/binaries/dbgpProxy">Linux (x86_64)</a></title>
		<li><a title="Linux-ARM" href="/files/binaries/dbgpProxy-arm64">Linux (arm64)</a></title>
		<li><a title="macOS" href="/files/binaries/dbgpProxy-macos">macOS (x86_64)</a></title>
		<li><a title="macOS-ARM" href="/files/binaries/dbgpProxy-macos-arm64">macOS (arm64)</a></title>
		<li><a title="Windows" href="/files/binaries/dbgpProxy.exe">Windows (x86_64)</a></title>
		<li><a title="IBMi" href="/files/binaries/dbgpProxy-IBMi">IBMi (ppc64)</a></title>
	</ul>
</div>
<p>Please refer to the <a href="/docs/dbgpProxy">documentation</a> to learn
about how to use the DBGp proxy tool.</p>

<!-------------------------- -->

<a name='debugclient'></a>
<a name='dbgpClient'></a>
<h2>Command Line Debug Client</h2>

<p>
A lightweight debugging client, mainly used for debugging the DBGp
implementation with Xdebug. It can show raw protocol information.
</p>
<p>
This binary may be used free of charge, but as-is and without warranty. Source
code is available on <a href='https://github.com/derickr/dbgp-tools/tree/master/dbgpClient'>GitHub</a>.
</p>

<div class="front_releases">
	<ul class="releases">
		<li><a title="Linux" href="/files/binaries/dbgpClient">Linux (x86_64)</a></title>
		<li><a title="Linux-ARM" href="/files/binaries/dbgpClient-arm64">Linux (arm64)</a></title>
		<li><a title="macOS" href="/files/binaries/dbgpClient-macos">macOS (x86_64)</a></title>
		<li><a title="macOS-ARM" href="/files/binaries/dbgpClient-macos-arm64">macOS (arm64)</a></title>
		<li><a title="Windows" href="/files/binaries/dbgpClient.exe">Windows (x86_64)</a></title>
	</ul>
</div>
<p>Please refer to the <a href="/docs/dbgpClient">documentation</a> to learn
about how to use the debug client.</p>

<!-------------------------- -->

<a name='historical'></a>
<h2>Historical Releases</h2>

<p>Previous releases can be found on the <a
href='/download/historical'>historical releases</a> page. Please refer to the
<a href="/docs/compat#versions">compatibility matrix</a> to find out which one are still
supported.</p>
