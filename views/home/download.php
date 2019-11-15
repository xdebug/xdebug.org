<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Downloads
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Downloads');
?>

<h1>Downloads</h1>

<h2>Source</h2>

<p>
The Xdebug extension helps you debugging your script by providing a lot of
valuable debug information. The debug information that Xdebug can
provide includes the following:
</p>

<p>Xdebug is hosted in GIT. The source code can be browsed through <a
href='https://github.com/xdebug/xdebug'>github</a> and can be checked out with:
</p>
<pre>
git clone git://github.com/xdebug/xdebug.git
</pre>

<a name='releases'></a>
<h2>Releases</h2>

<p>The Windows binaries generally work for every mini release for the mentioned
PHP version, although the extension is built against the most current PHP
version at that time. The VC<i>x</i>/VS<i>x</i> marker tells with which compiler the
extension was built, and Non-thread-safe whether ZTS was disabled. Those
qualifiers need to match the PHP version you're using. If you don't know which
one you need, please refer to the <a href='/wizard.php'>custom
installation instructions</a>.</p>

<?php foreach ($this->downloads as $download) : ?>
	<strong>Xdebug <?= $download->version ?></strong>
	<div class='copy'>Release date: <?=$download->date->format('Y-m-d') ?></div>
	<ul>
		<li><a href='<?= $download->href ?>'>source</a> <span class='md5'>(SHA256:&nbsp;<?=$download->hash ?>)</span></li>
		<?php if ($download->dlls) : ?>
			<li>Windows binaries:<br/>

			<?php foreach ($download->dlls as $i => $dll) : ?>
				<?php if ($i !== 0) : ?><br /><?php endif ?>
				<a href='<?= $dll['href'] ?>'>PHP <?= $dll['name'] ?></a> <span class='md5'>(SHA256:&nbsp;<?= $dll['hash'] ?>)</span>
			<?php endforeach ?>

			</li>
		<?php endif ?>
	</ul>
<?php endforeach ?>
