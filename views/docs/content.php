<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\RelatedContentDescription
 */
?>
<div class="content">
	<h2><span class='type'><img src="/images/docs/<?= sprintf('type-%02d.svg', $this->media_type) ?>"/></span><?= $this->title ?></h2>
	<?php
		if ($this->media_type == TYPE_YOUTUBE) {
			$link = str_replace( 'https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $this->url );
	?>
			<iframe width="560" height="315" src="<?= $link ?>?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<?php
		}
	?>
	<p><?= $this->description; ?></p>
</div>
