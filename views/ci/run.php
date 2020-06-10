<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\CiRun
 */
?>

<h2>CI Run '<?= $this->runId ?>'</h2>

<table class='ci'>
<tr class='version'>
	<th>PHP <?= $this->run->cfg->config ?></th>
	<th>Xdebug: <a href='https://github.com/xdebug/xdebug/commit/<?= $this->run->ref ?>'><?= $this->run->abbrev ?></a></th>
	<?php if ( isset( $this->run->cfg->opcache ) ) : ?>
	<th><div class='opcache-<?= $this->run->cfg->opcache ?>'><?= $this->run->cfg->opcache ? 'opcache' : 'no opcache' ?></div></th>
	<?php endif ?>
	<th><div class='time'><?= (new \DateTime( "@{$this->run->ts}" ))->format( 'Y-m-d<\b\r/>H:i:s' ) ?></div></th>
</tr>
</table>

<?php if ( $this->run->buildSuccess == false ) : ?>
	<h2 class='bf'>Build Failure</h2>

	<pre class='log'><?= htmlspecialchars($this->run->buildLog) ?></pre>
<?php else : ?>
	<h2 class='success'>Build Success</h2>

	<table class='ci'>
		<tr class='version'>
			<th>Tests</th>
			<th>Errors</th>
			<th>Failures</th>
			<th>Skipped</th>
			<th>Time</th>
		</tr>
		<tr>
			<td><?= $this->run->stats->tests ?></td>
			<td><?= $this->run->stats->errors ?></td>
			<td><?= $this->run->stats->failures ?></td>
			<td><?= $this->run->stats->skip ?></td>
			<td><div class='time'><?= $this->run->stats->time ?> s</div></td>
		</tr>
	</table>

	<?php if ( $this->run->stats->errors == 0 && $this->run->stats->failures == 0 ) : ?>
		<h2 class='success'>Test Success</h2>
	<?php else : ?>
		<h2 class='err'>Test Failure</h2>

		<?php foreach( $this->run->failures as $f ) : ?>
			<table class='ci'>
			<tr class='version'>
				<th>File: <a href='https://github.com/xdebug/xdebug/blob/<?= $this->run->ref ?>/tests/<?= $f->file ?>.phpt'>tests/<?= $f->file ?>.phpt</a></th>
			</tr>
			<tr>
				<td><?= $f->desc ?></td>
			</tr>
			<tr>
				<td class='log'><pre class='log'><?= htmlspecialchars( $f->reason ) ?></pre></td>
			</tr>
			</table>
		<?php endforeach ?>
	<? endif ?>
<? endif ?>
