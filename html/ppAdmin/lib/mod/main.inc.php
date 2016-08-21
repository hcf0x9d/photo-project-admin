<?php # Script 2.5 - main.inc.php

/*
* This is the main content module.
* This page is included by index.php.
*/

// Redirect if this page was accessed directly:
if(!defined('BASE_URL')) {
	require('../includes/config.inc.php');

	$url = BASE_URL.'index.php';

	header("Location: $url");
	exit;
} // End the defined IF statement

?>

HTML Content goes here....