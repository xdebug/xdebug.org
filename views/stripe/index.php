<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\SubscriptionData
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Support Sign Up');

use XdebugDotOrg\Model\Country;
?>

<h1>Sign Up to <?= $this->model->getName() ?></h1>

<?php if ( isset( $this->success ) && ! $this->success ): ?>
<p class="warning"><?= $this->reason; ?></p>
<?php endif ?>

<form method='POST' class='support'>
<p>
	Company Name:
	<input name='company_name' type='text'/>
</p>
<p>
	Contact Name:
	<input name='contact_name' type='text'/>
</p>
<p>
	Invoice Address:
	<textarea name='address' cols="80" rows="5"></textarea>
</p>
<p>
	VAT Number (required for European Union Countries):
	<input name='vat_number' type='text'/>
</p>
<p>
	Company Country:
	<select name='country'>
		<?php foreach( Country::cases() as $country ): ?>
			<option <? if ($country == Country::GB): ?>selected<? endif ?> value='<?= $country->name; ?>'><?= $country->value; ?></option>
		<?php endforeach ?>
	</select>
</p>
<br/>
<p>
	Contact Email:
	<input name='contact_email' type='text'/>
</p>
<p>
	Billing Email (optional):
	<input name='billing_email' type='text'/>
</p>
<p>
	Newsletter Email (optional):
	<input name='newsletter_email' type='text'/>
</p>
<?php if ($this->model->packageProvidesLinks()): ?>
<br/>
<p>
	Link Text:
	<input name='link_text' type='text'/>
</p>
<p>
	Link Target:
	<input name='link_target' type='text' value='https://'/>
</p>
<p>
	Link SVG:
	<input name='link_svg' type='text'/>
	<br/><small>Provide a direct link to an SVG file to show instead of your
	Link Text. If you would rather email it, just write 'email' and I will
	reach out to you.</small>
</p>
<br/>
<?php endif ?>

<?php if ($this->model->isOpenAmount()) : ?>
<p>
	Contribution to <?= $this->model->getName() ?>
	<input name='contribution_amount' type='text' value=''/>
	<br/><small>(in GBP, VAT is added if applicable, minimum £<?= $this->model->contribution_amount ?>)</small>
</p>
<?php endif ?>
<?php if (!$this->model->isOpenAmount()) : ?>
<p>
	To Pay: £ <?= floor( $this->model->getCost() / 100 ); ?> + VAT (if applicable)
</p>
<?php endif ?>

<br/>
<p>
	<input type='hidden' name='package' value='<?= $this->package; ?>'>
	<input type='submit' name='submit' value='Go to Payment'/>
</p>
</form>
