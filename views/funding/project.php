<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\FundingProject
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Project: ' . $this->title);
?>

<h1>Project: <?= $this->title ?></h1>

<div class="projects">
	<h2>Contributors</h2>
	<div class='progress-with-overflow'>
		<?php if (($this->amountRaised / $this->amountRequested) <= 1) : ?>
			<div title='Contributions' class='business' style='width: <?= min(($this->amountRaised / $this->amountRequested) * 100, 100) ?>%'></div>
		<?php else : ?>
			<div title='Contributions' class='overflow' style='width: <?= min(($this->amountRaised / $this->amountRequested) * 100, 100) ?>%'></div>
			<div title='Extra Contributions' class='business' style='width: <?= min((($this->amountRaised / $this->amountRequested) * 100) - 100, 100) ?>%'></div>
		<?php endif ?>
		<div class='comment'><?= sprintf( '%0.1f %% of £ %s', ($this->amountRaised / $this->amountRequested) * 100, number_format( $this->amountRequested, 0, 2 ) ) ?></div>
	</div>

	<ul class='funding'>
	<?php foreach ($this->contributors as $contributor) : ?>
		<?php if ($contributor->logo !== null) : ?>
			<?php if ($contributor->both) : ?>
				<li class="both">
					<div class="outer">
						<div class="inner">
							<div><a href="<?= $contributor->link ?>"><img alt="" src="/images/logos/<?= $contributor->logo ?>"/></a></div>
							<div><a href="<?= $contributor->link ?>"><?= $contributor->name ?></a></div>
						</div>
						<div class="amount">
							£ <?= number_format( $contributor->amount, 0, 2 ) ?>
						</div>
					</div>
				</li>
			<?php else : ?>
				<li class="logo">
					<div class="outer">
						<div class="inner">
							<div><a href="<?= $contributor->link ?>"><img alt="<?= $contributor->name; ?>" src="/images/logos/<?= $contributor->logo ?>"/></a></div>
						</div>
						<div class="amount">
							£ <?= number_format( $contributor->amount, 0, 2 ) ?>
						</div>
					</div>
				</li>
			<?php endif ?>
		<?php else : ?>
			<li class="text">
				<div class="outer">
					<div class="inner">
						<div><a href="<?= $contributor->link ?>"><?= $contributor->name ?></a></div>
					</div>
					<div class="amount">
						£ <?= number_format( $contributor->amount, 0, 2 ) ?>
					</div>
				</div>
			</li>
		<?php endif ?>
	<?php endforeach ?>
	</ul>

	<ul class='funding'>
		<li class="text"><a href="/support/buy/<?= $this->id ?>">Contribute</a></li>
	</ul>

    <hr/>

    <div class="front_intro">
		<?= $this->proposal ?>
    </div>

    <div class="front_announcements">
        <h3>Updates</h3>

		<?= XdebugDotOrg\Controller\FundingController::project_updates($this->id)->render() ?>
    </div>
</div>
