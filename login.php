<?php
class login{

		protected $uname;
		private $upass;

		function login(){
			$sql = "SELECT uname FROM users WHERE uname=$uname";
		}

		function cuser($uname, $upass){

		$sql = "INSERT INTO users (uname, upass) VALUES (
			'{$connection->real_escape_string($_POST['uname'])}',
			'{$connectino->real_escape_string($_POST['upass'])}'";
				$insert = $connection->query($sql);

			// Print response from MySQL

			if ( $insert == TRUE){
                
			}else {
				die("Error: {$connection->errno} : {$connection->error}");
			}
		}
}
?>