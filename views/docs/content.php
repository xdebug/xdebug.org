<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\RelatedContentDescription
 */
?>
<div class="content">
	<h2><span class='type'><img src="/images/docs/<?= sprintf('type-%02d.svg', $this->media_type) ?>"/></span><?= $this->title ?></h2>
	<?php
		if ($this->media_type == TYPE_YOUTUBE) {
			$link = str_replace( 'https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', (string) $this->url );
	?>
		<div class="youtubeWrapper">
			<iframe width="560" height="349" src="<?= $link ?>?controls=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	<?php
		}
	?>
	<p><?= $this->description; ?></p>
</div>
