<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Page
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $this->title; ?></title>
	<meta name="ROBOTS" content="ALL" />
	<meta name="MSSmartTagsPreventParsing" content="true" />
	<meta name="DESCRIPTION" content="Xdebug: A powerful debugger for PHP" />
	<meta name="AUTHOR" content="Derick Rethans, as in derick@xdebug.org" />
	<link rel="icon" type="image/png" href="/images/favicon.png">
	<?= $this->headExtra ?>
	<link rel="stylesheet" type="text/css" href="/core2.css" />
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body>
	<?= XdebugDotOrg\Controller\TemplateController::default_menu()->render() ?>

	<main class="content_width"><?= $this->contents ?></main>


	<footer class="content_width">
		<p>
		This site and all of its contents are Copyright &copy; 2002-<?php echo date("Y"); ?> by Derick Rethans.<br />
		All rights reserved.
		</p>
	</footer>
</body>
</html>
