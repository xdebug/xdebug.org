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
	<link type="text/css" rel="stylesheet" href="/core.css"/>
	<link type="application/rss+xml" rel="alternate" href="/rss.php" />

	<?php if ( !empty( $this->tabFields ) ): ?>
		<link rel="stylesheet" type="text/css" href="/yui/build/tabview/assets/tabview.css"/>
		<link rel="stylesheet" type="text/css" href="/yui/build/tabview/assets/border_tabs.css"/>
		<link href="https://fonts.googleapis.com/css?family=Old+Standard+TT:400,400italic,700" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/yui/build/yahoo/yahoo.js"></script>
		<script type="text/javascript" src="/yui/build/event/event.js"></script>
		<script type="text/javascript" src="/yui/build/dom/dom.js"></script>
		<script type="text/javascript" src="/yui/build/element/element-beta.js"></script>

		<script type="text/javascript" src="/yui/build/tabview/tabview.js"></script>

		<style type="text/css">
			<?php foreach( $this->tabFields as $field ) : ?>
				#<?php echo $field; ?> .yui-content { padding:1em; } /* pad content container */
			<?php endforeach ?>
		</style>

		<script type="text/javascript">
		YAHOO.example.init = function() {
		<?php foreach( $this->tabFields as $field ) : ?>
		    var tabView<?php echo $field; ?> = new YAHOO.widget.TabView('<?php echo $field; ?>');
		<?php endforeach ?>
		};

		YAHOO.example.init();
		</script>
	<?php endif ?>

</head>
<body>
	<table style="width: 100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height: 64px; width: 18%; background: url(/images/topleft.gif);">&nbsp;</td>
			<td class="head" style="height: 64px; background: url(/images/topleft.gif);"><img id="logo" align="right" src="/images/xdebug.gif" alt="Xdebug"/></td>
			<td style="height: 64px; width: 18%; background: url(/images/topleft.gif);">&nbsp;</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td class="serif"><?= $this->contents ?></td>
			<td>&nbsp;</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td>
<div class="copy">
This site and all of its contents are
Copyright &copy; 2002-<?php echo date("Y"); ?> by Derick Rethans.<br />
All rights reserved.
</div>
			</td>
			<td>&nbsp;</td>
		</tr>
	</table>

</body>
</html>
