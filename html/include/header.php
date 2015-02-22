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
	<link type="text/css" rel="stylesheet" href="/core.css"/>

<?php
	if ( !empty( $tabFields ) )
	{
?>
<link rel="stylesheet" type="text/css" href="/yui/build/tabview/assets/tabview.css"/>
<link rel="stylesheet" type="text/css" href="/yui/build/tabview/assets/border_tabs.css"/>
<script type="text/javascript" src="/yui/build/yahoo/yahoo.js"></script>
<script type="text/javascript" src="/yui/build/event/event.js"></script>
<script type="text/javascript" src="/yui/build/dom/dom.js"></script>
<script type="text/javascript" src="/yui/build/element/element-beta.js"></script>

<script type="text/javascript" src="/yui/build/tabview/tabview.js"></script>

<style type="text/css">
<?php foreach( $tabFields as $field ) { ?>
#<?php echo $field; ?> .yui-content { padding:1em; } /* pad content container */
<?php } ?>
</style>

<script type="text/javascript">
YAHOO.example.init = function() {
<?php foreach( $tabFields as $field ) { ?>
    var tabView<?php echo $field; ?> = new YAHOO.widget.TabView('<?php echo $field; ?>');
<?php } ?>
};

YAHOO.example.init();
</script>
<?php
	}
?>

</head>
<body>
	<table style="width: 100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height: 64px; width: 18%; background: url(/images/topleft.gif);">&nbsp;</td>
			<td class="head" style="height: 64px; background: url(/images/topleft.gif);"><img id="logo" align="right" src="/images/xdebug.gif" alt="Xdebug"/></td>
			<td style="height: 64px; width: 18%; background: url(/images/topleft.gif);">&nbsp;</td>
		</tr>
<?php
	/* Defining some functions here */
	$db     = "blog";
	$login  = "blog";
	$passwd = "weblog";

	include 'include/links.php';

	@mysql_connect ('localhost', $login, $passwd);
	@mysql_select_db ($db);

	function include_news()
	{
		$d = glob("news/*.txt");
		sort($d);
		$d = array_reverse( $d );

		foreach ( $d as $item )
		{
			$date = preg_replace( '@^news/(.*).txt$@', '\1', $item );
			$file = file( $item );
			$title = array_shift( $file );
			echo "<dt class='main'>[{$date}] - $title</dt>\n";
			echo "<dd class='main'>\n";
			echo join( '', $file );
			echo "</dd>\n\n";
		}
	}

	function ulink ($url)
	{
		echo "<a href='$url'>$url</a>";
	}

	function url ($key, $text)
	{
		echo "<a href='/link.php?url=$key'>$text</a>";
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
			$ref = mysql_real_escape_string( $_SERVER["HTTP_REFERER"] );

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
