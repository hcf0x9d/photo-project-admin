<?php

	require 'db.php';

	// This is where we do the ajax work for the access code..
	

	if(!empty($_POST['access'])) {
		// check the DB for the access code...
		$code = $_POST['access'];

		$sql = "SELECT * FROM tbl_access WHERE accessCode='$code'";

		$mysqli = getConnection();

		$result = $mysqli->query($sql);

		if ($result) {
		    $count = $result->num_rows;
		    
		    if ($count >= 1) {
		        // If we have one result, start the session and return true
		        session_start();
		        $_SESSION['access'] = $code;
		        
		        echo '1';
		    } else {
		        // Return false...try again...
		        echo '0';

		    }
		}

	}
?>