<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Downloads
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Historical Releases');
?>

<a name='releases'></a>
<h2>Historical Releases</h2>

<p>This page lists downloads for all historical Xdebug releases. Please always
use the <a href="/download#releases">latest release</a>. If you don't know which one you
need, please refer to the <a href='/wizard.php'>custom installation
instructions</a>.</p>

<div class="front_releases">
<?php foreach ($this->downloads as $download) : ?>
	<a name='<?=preg_replace('/[^0-9A-Za-z]/', '_', $download->version) ?>'></a>
	<strong>Xdebug <?= $download->version ?></strong>
	<div class='copy'>Release date: <?=$download->date->format('Y-m-d') ?></div>
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
