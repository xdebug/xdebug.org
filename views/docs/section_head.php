<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\DocsSection
 */
?>
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
