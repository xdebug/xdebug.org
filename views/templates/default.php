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

p, ol, ul {
    line-height: 1.5em;
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
	margin-bottom: 40px;
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
	left: -65px;

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
    color: #2c611f;
    font-size: 18px;
    -webkit-font-smoothing: antialiased;
}

.content_width {
	margin: 0 auto;
	max-width: 1024px;
	padding: 0 20px;
	box-sizing: border-box;
}

#support {
	text-align: center;
	padding: 0 20px 40px;
}

main {
	overflow: hidden;
}

main h1 {
	margin: 1em 0;
}

main h2, main h3 {
	font-weight: 600;
}

pre, .example > code {
	padding: 20px;
    background: #eee;
    display: block;
    font-size: 14px;
    line-height: 1.5em;
}

h3 + p {
	margin-top: 0;
}

h3 + code {
	margin-top: 1em;
}

main p, main ul, main ol {
	max-width: 600px;
}

main p code, main li code {
	font-size: 16px;
}

footer {
	text-align: center;
	padding: 40px 20px !important;
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

.functions, .settings {
	margin: 3em 0;
}

.doc_function, .doc_setting {
	margin: 2em 0;
}

.doc_setting h3,
.doc_function h3 {
	margin-bottom: 0;
}

.support_options {
	overflow: hidden;
	margin: 3em 0;

	display: flex;
	justify-content: space-between;
}

.support_options .option {
    width: 30%;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
}

.support_options h2 {
	background: #BBDE94;
	padding: 1em;
	margin: 0;
	border-top: 3px solid #317E1E;
	text-align: center;
}

.support_options .option:first-child h2 {
	background-color: #e8e8e8;
    border-top-color: #a9a9a9;
}

.support_options h3, .support_options h4 {
	text-align: center;

	padding: 1em;
	margin: 0;
	border-bottom: 1px solid #CCC;
}

.support_options li {
	list-style: none;
	margin: 0;
	padding: 0 0 0 20px;
	position: relative;
}

.support_options li:not(.notick):before {
	content: '✔';
	display: block;
	position: absolute;
	left: 0;
	color: #317E1E;
}

.support_options ul {
	list-style: none;
	margin: 1em 0;
	padding: 0;
}

.support_options .contact {
	border-top: 2px solid #CCC;
	margin-top: auto;
	text-align: center;
	padding: 1em;
	min-height: 90px;
}

.terms p {
	max-width: 100%;
}
</style>

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
