<?php

// if(!empty($_POST['action'])) {

// 	switch ($_POST['action']) {
//     case "downloadZip":
//         downloadZip();
//         break;
// 	} 
// }

// function downloadZip() {
// 
session_start();
$access = $_SESSION['access'];	

	$dir = '../albums/'.$access;
	$zip_file = 'file.zip';

	// Get real path for our folder
	$rootPath = realpath($dir);

	$zip = new ZipArchive();
	$ret = $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

	if ($ret !== TRUE) {
	    printf('Failed with code %d', $ret);
	} else {
	    $options = array('add_path' => $dir.'_', 'remove_all_path' => TRUE);
	    $zip->addPattern('/\.(?:JPG|jpg)$/', $rootPath, $options);

	    $zip->close();
	}
print_r($options);

print_r($zip);
	// header('Content-Description: File Transfer');
	// header('Content-Type: application/octet-stream');
	// header('Content-Disposition: attachment; filename='.basename($zip_file));
	// header('Content-Transfer-Encoding: binary');
	// header('Expires: 0');
	// header('Cache-Control: must-revalidate');
	// header('Pragma: public');
	// header('Content-Length: ' . filesize($zip_file));
	// readfile($zip_file);
// }
?>