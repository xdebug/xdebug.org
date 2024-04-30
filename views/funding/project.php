<?php
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Project: ' . $this->title);
?>

<h1>Project: <?= $this->title ?></h1>

<div class="projects">
	<h2>Contributors</h2>
	<div class='progress'>
		<div title='Contributions' class='business' style='width: <?= ($this->amountRaised / $this->amountRequested) * 100 ?>%'></div>
		<div class='comment'><?= sprintf( '%0.1f %% of £ %s', ($this->amountRaised / $this->amountRequested) * 100, number_format( $this->amountRequested, 0, 2 ) ) ?></div>
	</div>

	<ul class='funding'>
	<?php foreach ($this->contributors as $contributor) : ?>
		<?php if ($contributor->logo !== null) : ?>
			<?php if ($contributor->both) : ?>
				<li class="both">
					<div class="outer">
						<div class="inner">
							<div><a href="<?= $contributor->link ?>"><img src="/images/logos/<?= $contributor->logo ?>"/></a></div>
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
							<div><a href="<?= $contributor->link ?>"><img src="/images/logos/<?= $contributor->logo ?>"/></a></div>
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
	<?= $this->proposal ?>
</div>
