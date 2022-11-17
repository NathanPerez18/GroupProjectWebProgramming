<?php
include 'config.php';
class dlogin extends config{
		
		private $uname;
		private $upass;
		public function __construct($name,$pass){
			$this->uname=$name;
			$this->upass=$pass;
		}

		public function login(){
			$connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if($connection->connect_error){
				die("Connection failed: ".$connection->connect_error);
			}
			session_start();

			$sql = "SELECT * FROM users WHERE uname = '$this->uname'";
			$result = $connection->query($sql);
			if($result->num_rows > 0){
				//exists
			}else{
				echo "User does not exist";
				return 0;
			}

			$row = $result->fetch_assoc();
			if($row['upass'] == $this->upass){
				$_SESSION["uid"] = $row["id"];
			}else{
				echo "Password Incorrect";
			}
			$connection->close();
			
			header("Location: index.php");
		}

		public function createUser(){
		$connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

		$sql = "INSERT INTO users (uname, upass, emailAddress) VALUES (
			'{$connection->real_escape_string($this->uname)}',
			'{$connection->real_escape_string($this->upass)}',
			'{$connection->real_escape_string($_POST['email'])}')";
			$insert = $connection->query($sql);
			$connection->close();
		}
	}
?>