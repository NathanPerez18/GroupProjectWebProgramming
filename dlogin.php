<?php
include 'config.php';
class dlogin extends config{
		
		private $uname;
		private $upass;
		public function __construct($name,$pass){
			$uname=$name;
			$upass=$pass;
		}


		public function login(){
			$sql = "SELECT uname FROM users WHERE uname LIKE '$uname'";
			$result = $connection->query($sql);
			if(mysqli_num_rows($sql) > 0){
				//exists
			}else{
				echo "User doesn't exist";
				return 0;
			}

			$result = $connection->query($sql);
			$row = $result->fetch_assoc();
			if($row['upass'] == $upass){
				$_SESSION["uid"] = $row["id"];
			}
			$connection->close();
		}

		public function createUser(){

		$sql = "INSERT INTO users (uname, upass) VALUES (
			'{$connection->real_escape_string($uname)}',
			'{$connection->real_escape_string($upass)}',
			'{$connection->real_escape_string($_POST['email'])}'";
			$insert = $connection->query($sql);
			$connection->close();
		}
	}
?>