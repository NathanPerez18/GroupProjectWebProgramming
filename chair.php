<?php
    if (!empty($_POST))
	{
		// Create a database connection
		$dbhost = "localhost";
		$dbuser = "input_user";
		$dbpass = "5550123";
		$dbname = "reg_form";
		$connection = mysqli_connect ($dbhost,$dbuser,$dbpass,$dbname);
		if (mysqli_connect_errno()){
			die("Database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
		}

		$sql = "INSERT INTO information ( name,city,gender,age,postal) VALUES (
			'{$connection->real_escape_string($_POST['name'])}',
			'{$connection->real_escape_string($_POST['city'])}',
			'{$connection->real_escape_string($_POST['gender'])}',
			'{$connection->real_escape_string($_POST['age'])}',
			'{$connection->real_escape_string($_POST['postal'])}')";
				$insert = $connection->query($sql);

			// Print response from MySQL

			if ( $insert == TRUE){
                
			}else {
				die("Error: {$connection->errno} : {$connection->error}");
			}

		// Close our connetion
		$connection->close();
	}
?>