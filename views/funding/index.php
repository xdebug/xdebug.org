<?php
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Projects');
?>

<h1>Projects Xdebug</h1>

<div class="projects">
	<?php foreach ($this->projects as $project) : ?>
		<?php $id = preg_replace( '@-.*$@', '', $project->id ); ?>
		<h2> <?= $project->title ?> <a name="<?= $id ?>" href="#<?= $id ?>">#<?= $id ?></a></h2>
		<div class='progress'>
			<div title='Contributions' class='business' style='width: <?= ($project->amountRaised / $project->amountRequested) * 100 ?>%'></div>
			<div class='comment'><?=
				sprintf(
					'%0.1f %% of £%s',
					($project->amountRaised / $project->amountRequested) * 100,
					number_format($project->amountRequested, 0, 2)
				)
			?></div>
		</div>
		<p>
			<?= $project->description ?>
		</p>
		<p><a href="/funding/<?= $project->id ?>">Project Proposal</a></p>
	<?php endforeach ?>
</div>
