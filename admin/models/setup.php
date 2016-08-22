<?php
session_start();

$access = $_SESSION['access'];
$path = $_SERVER["DOCUMENT_ROOT"];

$structure = $path.'/albums'';

// To create the nested structure, the $recursive parameter 
// to mkdir() must be specified.

if (!mkdir($structure, 0777, true)) {
    die('Failed to create folders...');
}

?>