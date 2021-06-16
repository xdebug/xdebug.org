<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\RelatedContentDescription
 */
?>
<li><span class='type'><img src="/images/docs/<?= sprintf('type-%02d.svg', $this->media_type) ?>"/></span> <a target='_blank' href='<?= $this->url ?>'><?= $this->title ?></a>
<p><?= $this->description; ?></p>
</li>
