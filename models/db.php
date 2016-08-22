<?php

require 'config.php';

function getConnection($port = false) {
    global $dbServername, $dbUsername, $dbPassword, $database, $port;

    if ($port) {
	    $mysqli = new mysqli( $dbServername, $dbUsername, $dbPassword, $database, $port);
    } else {
	    $mysqli = new mysqli( $dbServername, $dbUsername, $dbPassword, $database);
	}
	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL database " . $database . ": " . $mysqli->connect_error;
	}
    return $mysqli;
}