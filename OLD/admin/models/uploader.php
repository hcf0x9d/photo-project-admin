<?php
session_start();
include 'config.php';

$mysqli = mysqli_connect($dbServername, $dbUsername, $dbPassword, $database);

$ds = DIRECTORY_SEPARATOR;

$path = $_SERVER["DOCUMENT_ROOT"];
$access = $_SESSION['access'];

$storeFolder = $path.$ds.'albums'.$ds.$access.$ds;

mkdir($storeFolder, 0777, true);

if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];             
    $targetPath = $storeFolder . $ds;
    $targetFile =  $targetPath. $_FILES['file']['name'];

    move_uploaded_file($tempFile,$targetFile);

    $sql = "SELECT `id` FROM `tbl_access` WHERE `accessCode` = '$access'";
    $exists = $mysqli->query($sql);

    // Check to see if the record for this access code exists
    if ($exists->num_rows === 0) {
    	// if it doesn't, make it.
    	$sql = "INSERT INTO `tbl_access` (`id`, `accessCode`, `GUID`)
            VALUES (NULL, '$access', '');";
    	$result = $mysqli->query($sql);    
    }   

}
?>