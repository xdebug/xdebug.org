<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\FundingProjectsList
 */
?>
<ul>
<?php foreach ($this->projects as $project) : ?>
	<?php $id = preg_replace( '@-.*$@', '', $project->id ); ?>
	<li>
		<small>#<?= $id; ?></small>. <a href="/funding/<?= $project->id ?>"><?= $project->title ?></a>
		<div class='progress-small'>
			<div title='Contributions' class='business' style='width: <?= ($project->amountRaised / $project->amountRequested) * 100 ?>%'></div>
			<div class='comment'><?=
				sprintf(
					'%0.1f %% Raised',
					($project->amountRaised / $project->amountRequested) * 100,
				)
			?></div>
		</div>
	</li>
<?php endforeach ?>
</ul>
