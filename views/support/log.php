<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\SupportLog
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Log');
?>

<h1>Log and Supporters Xdebug</h1>

<?= XdebugDotOrg\Controller\TemplateController::support_menu()->render() ?>

<div class="left">
	<?php foreach ($this->reports as $report) : ?>
		<h2><?= $report->start->format( "F Y" ) ?></h2>
		<div class='funding'>
			<div class='others' style='width: <?= $report->others ?>%'></div>
			<div class='business' style='width: <?= $report->business ?>%'></div>
			<div class='pro' style='width: <?= $report->pro ?>%'></div>
			<div class='patreon' style='width: <?= $report->patreon ?>%'></div>
			<div class='github' style='width: <?= $report->github ?>%'></div>
			<div class='comment'>Time Funded</div>
		</div>

		<div class='spend'>
			<?php foreach ($report->totalHours as $type => $value) : ?>
				<div class='type-<?= $type ?>' style='width: <?= $value ?>%'></div>
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

<div class="right">
<h2>Current Supporters</h2>

<ul class='supporters'>
<?php foreach ($this->supporters as list($link, $name)) : ?>
	<li><a href="<?= $link ?>"><?= $name ?></a></li>
<?php endforeach ?>
</ul>

<p>You can also be listed as a supporter by <a href='/support'>signing up</a> for a <i>Business</i> package.</p>

</div>
