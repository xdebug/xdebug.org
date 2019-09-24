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
	<?= $this->headExtra ?>
<style>

body {
	margin: 0;
	padding: 0;
	font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;
}

a {
	color: #317E1E;
	text-decoration: none;
}

p a, ul a {
	font-weight: bold;
}

a:hover {
	text-decoration: underline;
}

nav {
	background-color: #A5D471;
}

nav > div {
	position: relative;
}

nav > div:before {
	content: '';
	display: block;
	position: absolute;
	width: 100%;
	height: 100%;
	left: -85px;

	background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4ODUiIGhlaWdodD0iMzE5IiB2aWV3Qm94PSIwIDAgODg1IDMxOSI+PGcgZmlsbD0iI0ZGRiIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNNTY0LjE3LjVMNzI0IDE2MS40OSA1NjQuMTcgMzE4LjVILjQ2TDE2NyAxNTguODcuNDYuNXoiIG9wYWNpdHk9Ii40NCIvPjxwYXRoIGQ9Ik04ODQuOC41TDcyNCAxNjEuNDkgNTY0LjE3LjV6TTg4NC45IDMxOC41TDcyNCAxNjEuNWwtMTU5Ljk1IDE1N3oiIG9wYWNpdHk9Ii4yNSIvPjwvZz48L3N2Zz4=");
	background-repeat: no-repeat;
	background-size: contain;
}

nav h1 {
	position: relative;
	z-index: 2;
	display: inline-block;
	margin: 25px 0;
}

nav h1 svg {
    width: 130px;
    height: 67px;
}

nav ul {
	position: relative;
    z-index: 2;
    display: inline-block;
    margin: 30px 0 0 100px;
    vertical-align: top;
    padding: 0;
}

nav ul li {
	display: inline-block;
    padding: 20px;
}

nav ul li a {
	text-decoration: none;
	font-weight: bold;
	color: #16450A;
	font-size: 18px;
}

.content_width {
	margin: 0 auto;
	max-width: 1024px;
}

#support {
	text-align: center;
	padding: 40px 20px 60px;
}

main {
	overflow: hidden;
}

.front_intro {
	width: 60%;
	float: left;
}

.front_intro ul {
	margin: 0;
	padding: 0;
	margin-left: 0;
    -webkit-padding-start: 20px;
    padding-inline-start: 20px;
}

.front_intro ul li {
	margin: 20px 0;
}

.front_announcements {
	margin-left: 5%;
	width: 35%;
	float: left;
}

.front_announcements ul {
	margin: 0;
	padding: 0;
}

.front_announcements ul li {
	list-style: none;
	margin: 1em 0;
	padding: 0;
}

footer {
	text-align: center;
	padding: 40px 20px;
}
</style>

</head>
<body>
	<?= XdebugDotOrg\Controller\TemplateController::default_menu()->render() ?>

	<main class="content_width"><?= $this->contents ?></main>


	<footer class="content_width">
		This site and all of its contents are Copyright &copy; 2002-<?php echo date("Y"); ?> by Derick Rethans.<br />
		All rights reserved.
	</footer>
</body>
</html>
