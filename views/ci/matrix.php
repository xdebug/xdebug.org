<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\CiMatrix
 */
?>

<table class='ci'>
	<tr class='version'>
		<th></th>

		<?php foreach ( $this->abbrevs as $version ) : ?>
			<?php if ( preg_match('@(.*)-g([0-9a-f]+)$@', $version->abbrev, $m) ) : ?>
				<th>
					<a href='https://github.com/xdebug/xdebug/commit/<?= $m[2] ?>'><?= $m[1] ?></a><br/>
					<div class='time'><?= (new \DateTime( "@{$version->ts}" ))->format( 'Y-m-d<\b\r/>H:i:s' ) ?></div>
					<?php if ( isset( $version->cfg->opcache ) ) : ?>
						<div class='opcache-<?= $version->cfg->opcache?>'><?= $version->cfg->opcache ? "opcache" : "no opcache" ?></div>
					<?php endif ?>
				</th>
				<?php continue; ?>
			<?php endif ?>

			<th>
				<div><a href='https://github.com/xdebug/xdebug/commit/<?= $version->ref ?>'><?= $version->abbrev ?></a><br/>
					<div class='time'><?= (new \DateTime( "@{$version->ts}" ))->format( 'Y-m-d<\b\r/>H:i:s' ) ?></div>
				</th>
		<?php endforeach ?>
	</tr>

	<?php foreach ( $this->phpVersions as $version ) : ?>
		<tr>
			<th><?= $version ?></th>

			<?php foreach ( $this->abbrevs as $abbrev => $ref ) : ?>
				<?php if ( !isset( $this->matrix[$abbrev][$version] ) ) : ?>
					<td class='missing'></td>
					<?php continue; ?>
				<?php endif ?>

				<td>
					<?php foreach ($this->matrix[$abbrev][$version] as $variant ) : ?>
						<?php if ($variant->buildSuccess != true) : ?>
							<a class='bf' label='<?= $variant->_id ?>' href='/ci?r=<?= $variant->_id ?>'>✖</a>
							<?php continue; ?>
						<?php endif ?>

						<?php if ($variant->stats->errors != 0 || $variant->stats->failures != 0) : ?>
							<a class='err' label='<?= $variant->_id ?>' href='/ci?r=<?= $variant->_id ?>'>✖</a>
							<?php continue; ?>
						<?php endif ?>

						<a class='success' alt='<?= $variant->_id ?>' href='/ci?r=<?= $variant->_id ?>'>✔</a>
					<?php endforeach ?>
				</td>
			<?php endforeach ?>
		</tr>
	<?php endforeach ?>
</table>
