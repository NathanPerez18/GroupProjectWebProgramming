<?php
class login extends config{
		
		private $uname;
		private $upass;
		public function _construct($name,$pass){
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

		}

		public function createUser($uname, $upass){

		$sql = "INSERT INTO users (uname, upass) VALUES (
			'{$connection->real_escape_string($_POST['uname'])}',
			'{$connection->real_escape_string($_POST['upass'])}',
			'{$connection->real_escape_string($_POST['email'])}'";
			$insert = $connection->query($sql);
		}
	}
?>