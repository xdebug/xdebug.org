<?php

	function url_count ($key)
	{
		$res = mysql_query ("SELECT * FROM links WHERE idkey = '$key'");
		echo mysql_error();
		if (mysql_num_rows ($res) == 0) {
			mysql_query ("INSERT INTO links (idkey, url, hits) VALUES ('$key', '{$GLOBALS['url'][$key]}', 1)");
		} else {
			mysql_query ("UPDATE links SET hits = hits + 1 WHERE idkey = '$key'");
		}
	}

	$db     = "blog";
	$login  = "blog";
	$passwd = "weblog";

	include 'include/links.php';

	mysql_pconnect ('localhost', $login, $passwd);
	mysql_select_db ($db);

	url_count ($_GET['url']);

	header ("Location: {$GLOBALS['url'][$_GET['url']]}");
?>	
