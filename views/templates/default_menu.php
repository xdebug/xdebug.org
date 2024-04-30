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

<?php if ( !in_array( $_SERVER['REQUEST_URI'], [ '/log', '/ai' ] ) && ( !str_starts_with( $_SERVER['REQUEST_URI'], '/support' ) ) && ( !str_starts_with( $_SERVER['REQUEST_URI'], '/funding' ) ) ) : ?>
	<div class="content_width" id="support">If you find Xdebug useful, please consider <a href='/support'>supporting the project</a>.</div>
<?php endif ?>
