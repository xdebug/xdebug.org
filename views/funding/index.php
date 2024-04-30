<?php
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Projects');
?>

<h1>Projects Xdebug</h1>

<div class="projects">
	<?php foreach ($this->projects as $project) : ?>
		<h2><?= $project->title ?></h2>
		<div class='funding'>
			<div title='Contributions' class='business' style='width: <?= ($project->amountRaised / $project->amountRequested) * 100 ?>%'></div>
			<div class='comment'><?= sprintf( '%0.1f %% of £%.0f Raised', ($project->amountRaised / $project->amountRequested) * 100, $project->amountRequested) ?></div>
		</div>
		<p>
			<?= $project->description ?>
		</p>
		<p><a href="/funding/<?= $project->id ?>">Project Proposal</a></p>
	<?php endforeach ?>
</div>
