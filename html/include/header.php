<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $title; ?></title>
	<meta name="ROBOTS" content="ALL" />
	<meta name="MSSmartTagsPreventParsing" content="true" />
	<meta name="DESCRIPTION" content="Xdebug: A powerful debugger for PHP." />
	<meta name="KEYWORDS" content="derick, rethans, opensrc, php, php4, xml, xhtml, xml-rpc, soap, blog, weblog" />
	<meta name="AUTHOR" content="Derick Rethans, as in derick @ php dot net or opensrc @ EFNet" />
	<style type="text/css">
		body, table, td, table.table
		         { margin: 0px; padding: 0px; }
		table.table
                 { border: solid gray; border-width: thin; margin: 0px; padding: 0px; }
		body     { background-color: white; }
	    table.table td, table.table th { border: solid #aaa; border-width: thin; }
		td		 { text-align: left; vertical-align: top; }
		td.head  { vertical-align: bottom; }
		body, td { font-family: georgia, palatino, serif; }
		th.ctr   { text-align: center; padding-left: 10px; padding-right: 10px; vertical-align: bottom; }
		td.ctr   { text-align: center; padding-left: 10px; padding-right: 10px; vertical-align: bottom; }

		img      { border: 0px; vertical-align: bottom; }
		img.l    { margin-right: 10px; }
		img.r    { margin-left: 10px; }
		
		a        { text-decoration: underline; color: #116633; }
		a:hover  { color: #004411 }
		
		p        { font-size: small; line-height: 1.5em; margin-left: 20px; }
		.serif   { font-size: small; line-height: 1.5em; }
		.quote   { font-size: x-small; font-family: arial; }
        .mk      { font-size: x-small; color: #004411; font-weight: bold; }
     	.fin	 { font-size: x-small; color: #004411; }
        .sans	 { font-family: verdana, helvetica, arial, sans-serif; font-size: x-small; font-weight: bold; color: #003300; }
        .date    { font-size: x-small; display: block; margin-bottom: 6px; }
        .sc      { font-variant: small-caps; }
        .st      { text-decoration: line-through; }
        .copy    { font-size: x-small; line-height: 1.5em; color: #999999; }
		p.center { text-align: center; }
        .pause   { font-size: medium; display: block; color: #004411;
                   margin-top: 24px; margin-bottom: 8px; text-align: center; }
                   
        acronym, abbr
                 { font-variant: small-caps; text-decoration: none; border-bottom: 0;}

		dt       { margin-left: 20px; margin-top: 10px; font-weight: bold; }
		dd       { margin-left: 40px; margin-bottom: 0px; }
		dd.red   { margin-left: 40px; margin-bottom: 10px; color: #dd0000; }
		li.red   { color: #dd0000; }
		dd.orange{ margin-left: 40px; margin-bottom: 10px; color: #ffc300; }
		li.orange{ color: #ffc300; }
		dd.green { margin-left: 40px; margin-bottom: 10px; color: #00bb00; }
		li.green { color: #00bb00; }
		dl.status { margin-left: -20px; padding-left: 0px; }
		ul.status { margin-left: 25px; padding-left: 0px; }

		dt.main { font-weight: normal; }
		dd.main { margin-left: 20px; }

		pre { margin-left: 20px; line-height: 1em; }
		pre.example, pre.literal-block { margin-left: 30px; margin-right: 30px; background-color: #eaffeb; }

		h1 { font-variant: small-caps; font-size: x-large }
		h2 { font-variant: small-caps; font-size: large }
		h3 { font-variant: small-caps; font-size: large }
	</style>
</head>
<body>
	<table style="width: 100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height: 64px; width: 9%; background: url(images/topleft.gif);">&nbsp;</td>
			<td class="head" style="height: 64px; background: url(images/topleft.gif);">
			</td>
			<td style="height: 64px; width: 35px; background: url(images/topleft.gif);">&nbsp;</td>
			<td class="head" style="height: 64px; width: 220px; background: url(images/topleft.gif);"><img src="images/xdebug.gif" alt="Xdebug"/></td>
			<td style="height: 64px; width: 9%; background: url(images/topleft.gif);">&nbsp;</td>
		</tr>
<?php
	/* Defining some functions here */
	$db     = "blog";
	$login  = "blog";
	$passwd = "weblog";

	include 'include/links.php';

	@mysql_pconnect ('localhost', $login, $passwd);
	@mysql_select_db ($db);
	

	function ulink ($url)
	{
		echo "<a href='$url'>$url</a>";
	}

	function url ($key, $text)
	{
		echo "<a href='link.php?url=$key'>$text</a>";
	}

	function hits ($key)
	{
		$res = @mysql_query ("SELECT * FROM hits WHERE idkey = '$key'");
		if (@mysql_num_rows ($res) == 0) {
			@mysql_query ("INSERT INTO hits (idkey, hits) VALUES ('$key', 1)");
		} else {
			@mysql_query ("UPDATE hits SET hits = hits + 1 WHERE idkey = '$key'");
		}
	}

	function refer ()
	{
		if (isset ($_SERVER["HTTP_REFERER"]) && !empty ($_SERVER["HTTP_REFERER"])) {
			$ref = $_SERVER["HTTP_REFERER"];

			$res = @mysql_query ("SELECT * FROM refer WHERE refer = '$ref'");
			if (@mysql_num_rows ($res) == 0) {
				@mysql_query ("INSERT INTO refer (refer, hits) VALUES ('$ref', 1)");
			} else {
				@mysql_query ("UPDATE refer SET hits = hits + 1 WHERE refer = '$ref'");
			}
		}
	}

	function comments ($key)
	{
		/* Select all comments */
		$res = mysql_query ("SELECT * FROM comments WHERE idkey = '$key' ORDER BY date DESC");
?>
<p><span class="serif">
<strong>Comments</strong><br />
</span></p>
<?php
		while ($row = mysql_fetch_assoc ($res)) {
?>
<p>
<strong><span class="sans"><?php echo $row['name']. ' - '. date("l, jS of F, Y; H:i:s", $row['date']); ?></strong>
<br />
<?php echo stripslashes ($row['comment']); ?>
</span>
</p>
<?php
		}
?>
<p>
<span class="sans"><a target="new" href="add_comment.php?key=<?php echo $key; ?>">Add comment</a></span>
</p>
<br />
<br />
<?php

	refer();

	}
?>
