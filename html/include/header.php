<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $title; ?></title>
	<meta name="ROBOTS" content="ALL" />
	<meta name="MSSmartTagsPreventParsing" content="true" />
	<meta name="DESCRIPTION" content="Xdebug: A powerful debugger for PHP" />
	<meta name="AUTHOR" content="Derick Rethans, as in derick@xdebug.org" />
	<link type="text/css" rel="stylesheet" href="/core.css"/>
	<link type="application/rss+xml" rel="alternate" href="/rss.php" />

<?php
	if ( !empty( $tabFields ) )
	{
?>
<link rel="stylesheet" type="text/css" href="/yui/build/tabview/assets/tabview.css"/>
<link rel="stylesheet" type="text/css" href="/yui/build/tabview/assets/border_tabs.css"/>
<link href="https://fonts.googleapis.com/css?family=Old+Standard+TT:400,400italic,700" rel="stylesheet" type="text/css">
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
			echo "<a name='" . preg_replace('/-/', '_', $date) ."'></a>\n";
			echo "<dt class='main'>[{$date}] - $title</dt>\n";
			echo "<dd class='main'>\n";
			echo join( '', $file );
			echo "</dd>\n\n";
			echo "<hr/>\n";
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
?>
