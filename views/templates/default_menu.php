<nav>
	<div class="content_width">
		<h1><a href="/"><?= file_get_contents('../html/images/logo.svg') ?></a></h1>
		<ul id="menu">
			<li><a href="/docs/install">Install</a></li>
			<li><a href="/docs/">Documentation</a></li>
			<li><a href="/reporting-bugs">Report Issues</a></li>
			<li><a href="https://github.com/xdebug/xdebug" target="_blank">GitHub</a></li>
		</ul>
	</div>
</nav>
<div class="deprecated">
You're visiting the archived website and documentation of Xdebug 2, which is no longer supported. This website is temporarily available and will be discontinued on Dec 31st, 2021.
</div>

<?php if (!in_array($_SERVER['REQUEST_URI'], ['/support', '/log'])) : ?>
	<div class="content_width" id="support">If you find Xdebug useful, please consider <a href='/support'>supporting the project</a>.</div>
<?php endif ?>
