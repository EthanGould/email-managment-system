<?php
include( "databaseConfig.php" );

// creates new users
function createUser( $email, $connection ) {
	$sql = "INSERT INTO `users` ( `email`, `password` ) VALUES ( '$email', 'default' );";
	$query = mysql_query( $sql, $connection );

	// insert new user into users table
	if ( ! $query ) {
		// something went wrong with the SQL query
		die ();
	} else {
		// we assume user successfully created...
		return true;
	}
}

// finds user based on email
function getUserByEmail( $email, $connection ) {
	$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
	$query = mysql_query( $sql, $connection );

	// insert new user into users table
	if ( ! $query ) {
		// something went wrong with the SQL query
		return false;
	} else {
		// get data from return resource (dataset)
		$row = mysql_fetch_assoc( $query );

		if ( $row ) {
			// found user
			return $row;
		} else {
			// no user found
			return false;
		}
	}
}

// saves new messages to DB
function createMessage( $message, $connection ) {

	$userId = $message[ 'user_id' ];
	$subject = $message[ 'subject' ];
	$content = $message[ 'content' ];

	$sql = "INSERT INTO `messages` ( `user_id`, `subject`, `content` ) VALUES ( '$userId', '$subject', '$content' );";
	$query = mysql_query( $sql, $connection );

	// insert new user into users table
	if ( ! $query ) {
		// something went wrong with the SQL query response
		return false;
	} else {
		// message successfully created...
		$row = mysql_fetch_assoc( $query );
		return true;
	}
}

// compile message content form POST params
function compileMessage( $params, $userId ) {
	$messageData =  array( 
						'user_id' => $userId,
						'subject' => $params["subject"],
						'content' => $params["content"]
						);

	return $messageData;
}
