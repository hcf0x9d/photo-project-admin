<?php
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

$dbServername = 'localhost';
// $port = '21';
//
if (stristr($_SERVER["HTTP_HOST"], "jasonfukura.dev")) {
	$database = 'f83';
	$dbUsername = 'f83Admin';
	$dbPassword = 'vbq32EyuADDWQf33';

} else {
	$database = 'jfukura_f83';
	$dbUsername = 'jfukura_f83';
	$dbPassword = 'ae{aZE!Tk,D~';

}

?>