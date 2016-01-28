<?php 
	include( "databaseConfig.php" );
	include( "queries.php" );

	// validate incoming message form data
	$isValid = true;

	// // confirm email is in email format
	if ( strpos( $_POST["email"], "@" ) ) {
	} else {
		$isValid = false;
	}

	// // confirm the message has subject
	if ( strlen( $_POST["subject"] ) > 2 ) {
	} else {
		$isValid = false;
	}

	// // confirm the message has content
	if ( strlen( $_POST["content"] ) > 2 ) {
	} else {
		$isValid = false;
	}

	// if form is filled out properly
	if ( $isValid ) {
		// have we seent this user before?
		$cleanEmail = mysql_real_escape_string( $_POST['email'] );
		$previousUser = getUserByEmail( $cleanEmail, $connection );

		if ( ! $previousUser ) { 
			// create the user if they do not exist
			createUser( $cleanEmail, $connection );
			$newUser = getUserByEmail( $cleanEmail, $connection );
			// determine their ID
			$userId = $newUser[ "id" ];

		} else {
			// if user is found determine their ID
			$userId = $previousUser[ "id" ];
		}

		// get message contents
		$message = compileMessage( $_POST, $userId );

		// create the message!
		createMessage( $message, $connection );

		// send message to user that their message has been recieved
		header( "Location: thankyou.php" );
	} else {

		// redirect back to empty form
		header( "Location: newMessage.php" );
	}	
