<!DOCTYPE>
<html>
<head>
	
</head>
<body>
	<?php

		include("databaseConfig.php");
		include( "navbar.php" );

		// drop and recreate DB
		$sql = "DROP DATABASE IF EXISTS $database";

		$returnVal = mysql_query( $sql, $connection );

		if ( ! $returnVal ) {
			die ( "could not drop Database<br>" );
		} else {
			echo "dropped the DB!<br>";
		}		


		$sql = "CREATE DATABASE IF NOT EXISTS $database";
		$returnVal = mysql_query( $sql, $connection );

		if ( ! $returnVal ) {
			die ( "could not creat Database<br>" );
		} else {
			echo "created and connected to the DB!<br>";
		}



		// created DB, now Create users table
		$user_table = "CREATE TABLE IF NOT EXISTS `$database`.`users` (`id` int(11) NOT NULL,`email` varchar(256) NOT NULL,`password` varchar(256) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

		$returnVal = mysql_query( $user_table, $connection );

		$user_table = "ALTER TABLE `$database`.`users` ADD PRIMARY KEY (`id`), ADD KEY `email` (`email`);";

		$returnVal = mysql_query( $user_table, $connection );

		$user_table = "ALTER TABLE `$database`.`users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";

		$returnVal = mysql_query( $user_table, $connection );
		
		if ( ! $returnVal ) {
			die ( "ERROR: could not create users table<br>" );
		} else {
			echo "Users table created successfully<br>";
		}



		// create messages table
		$messages_table = "CREATE TABLE IF NOT EXISTS `$database`.`messages` (`id` int(11) NOT NULL,`user_id` int(11) NOT NULL,`subject` varchar(256) NOT NULL,`content` text NOT NULL,`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

		$returnVal = mysql_query( $messages_table, $connection );

		$messages_table = "ALTER TABLE `$database`.`messages` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT primary key;";

		$returnVal = mysql_query( $messages_table, $connection );

		if ( ! $returnVal ) {
			die ( "ERROR: could not create Messages Table<br>" );
		} else {
			echo "Messages table created successfully<br>";
		}

	?>
</body>
</html>