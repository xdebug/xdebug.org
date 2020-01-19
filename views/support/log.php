<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\SupportLog
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Log');
?>

<h1>Xdebug Log</h1>

<div class="log_left">
	<?php foreach ($this->reports as $report) : ?>
		<h2><?= $report->start->format( "F Y" ) ?></h2>
		<div class='funding'>
			<div title='Funding Partners' class='others' style='width: <?= $report->others ?>%'></div>
			<div title='Business Support' class='business' style='width: <?= $report->business ?>%'></div>
			<div title='Pro Support' class='pro' style='width: <?= $report->pro ?>%'></div>
			<div title='Patrons' class='patreon' style='width: <?= $report->patreon ?>%'></div>
			<div title='GitHub Sponsors' class='github' style='width: <?= $report->github ?>%'></div>
			<div class='comment'>Time Funded</div>
		</div>

		<div class='spend'>
			<?php foreach ($report->totalHours as $type => $value) : ?>
				<div title='<?= $type ?>' class='type-<?= $type ?>' style='width: <?= $value ?>%'></div>
			<?php endforeach ?>
			<div class='comment'>Time Spent</div>
		</div>

		<table class='log'>
			<tr>
				<th class='day'>Day</th>
				<th class='type'>Type</th>
				<th class='description'>Description</th>
				<th class='hours'>Hours</th>
			</tr>
			<?php foreach ($report->days as $day_report) : ?>
				<tr>
					<td class='day'><?= $day_report->day ?></td>
					<td class='type'>
						<div class='type-<?= $day_report->type ?>'><?= $day_report->type ?></div>
					</td>
					<td><?= $day_report->description ?></td>
					<td class='hours'><?= $day_report->hours ?></td>
				</tr>
			<?php endforeach ?>
		</table>

		<?php if ($report->url) : ?>
			<p>For additional information, please see the <a href='https://derickrethans.nl/xdebug-update-<?= $report->url ?>.html'>monthly</a> report.</p>
		<?php endif ?>
		<br/>
	<?php endforeach ?>
</div>
