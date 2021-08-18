<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Settings
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation » All settings');
?>

<h1>Documentation - all settings</h1>

<p>
This section describes all available configuration settings available in Xdebug.
</p>
<p>
Unless specifically mentioneds, each setting can be set in
<code>php.ini</code>, files like <code>99-xdebug.ini</code>, but also in
Apache's <code>.htaccess</code> and PHP-FPM's <code>.user.ini</code> files.
</p>

<a name="XDEBUG_CONFIG"></a>
<h4>XDEBUG_CONFIG environment variable <a href='#XDEBUG_CONFIG'>#</a></h4>
<p>
A select set of settings can be set through an <code>XDEBUG_CONFIG</code>
environment variable. In this situation, the <code>xdebug.</code> part should
be dropped from the setting name. An example of this is:
</p>
<pre>
export XDEBUG_CONFIG="client_host=192.168.42.34 log=/tmp/xdebug.log"
</pre>
<p>
The documentation for each setting below will indicate if it can be set through
<code>XDEBUG_CONFIG</code>.
</p>

<p class="warning">Some web servers have a configuration option to
prevent environment variables from being propagated to PHP and Xdebug.
<br/><br/>
For example, PHP-FPM has a <a
href="https://www.php.net/manual/en/install.fpm.configuration.php#clear-env"><code>clear_env</code></a>
configuration setting that is <code>on</code> by default, which you will
need to turn <code>off</code> if you want to use <code>XDEBUG_CONFIG</code>.
<br/><br/>
Make sure that your web server does not clean the environment, or specifically
allows the <code>XDEBUG_CONFIG</code> environment variable to be passed on.</p>

<div class='settings'>
	<?php foreach ($this->settings as $setting) : ?>
		<hr>
		<?= XdebugDotOrg\Controller\Docs\SettingsController::single($setting)->render() ?>
	<?php endforeach ?>
</div>
<hr />
