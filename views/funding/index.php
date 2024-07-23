<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\FundingProjectsList
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Projects');
?>

<h1>Projects</h1>

<p class="intro">
Welcome to our projects page, where we list initiatives seeking funding
support for Xdebug. Below, you'll find a list of projects aimed at improving
and advancing the capabilities of Xdebug, the debugging and profiling tool for
PHP. Explore these projects and consider supporting them to help enhance PHP
development with Xdebug.
</p>

<div class="projects">
	<?php foreach ($this->projects as $project) : ?>
		<?php $id = preg_replace( '@-.*$@', '', $project->id ); ?>
		<h2> <?= $project->title ?> <a name="<?= $id ?>" href="#<?= $id ?>">#<?= $id ?></a></h2>
		<div class='progress'>
			<div title='Contributions' class='business' style='width: <?= min(($project->amountRaised / $project->amountRequested) * 100, 100) ?>%'></div>
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
