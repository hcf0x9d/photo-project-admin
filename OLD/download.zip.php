<?php
session_start();

// Grab the access code from Session
$access = $_SESSION['access'];	

// This is the folder for the user (based on access code)
$the_folder = 'albums/'.$access;

// Get real path for our folder
$rootPath = realpath($the_folder);

// If the ZIP file doesn't exist, we need to create it
if(!file_exists($the_folder.'/images.zip')) {
	
	$zip = new ZipArchive();
	$zip->open($the_folder.'/images.zip', ZipArchive::CREATE);

	$files = new RecursiveDirectoryIterator($rootPath);
	foreach ($files as $name => $file)
	{
	    if (!$file->isDir())
	    {
	        // Get real and relative path for current file
	        $filePath = $file->getRealPath();
	        $relativePath = substr($filePath, strlen($rootPath) + 1);

	        // Add current file to archive
	        $zip->addFile($filePath, $relativePath);
	    }
	}
	$zip->close();
}

// Download the file
header('Content-Type: application/zip');
header("Content-Disposition: attachment; filename = $the_folder.'/images.zip'");
header('Content-Length: ' . filesize($the_folder.'/images.zip'));
header("Location: $the_folder/images.zip");
?>