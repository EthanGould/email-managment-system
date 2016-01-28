<?php
	// define MySQL DB settings
	$host = "localhost:8889";
	$user = "root";
	$password = "root";
	$database = "messaging_system";

	// Make connection to DB server
	$connection = mysql_connect( $host, $user, $password );
	if ( ! $connection ) {
		die ();
	} else {
		// print "connected to the Server!<br>";
	}

	mysql_select_db( $database, $connection );
?>