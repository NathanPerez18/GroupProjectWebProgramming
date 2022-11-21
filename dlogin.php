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
			//Creates connection to database
			$connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if($connection->connect_error){
				die("Connection failed: ".$connection->connect_error);
			}
			//Creates session for session variables
			session_start();
			$_SESSION["err"] = false;
			
			//Select query for databse from user table
			$sql = "SELECT * FROM users WHERE uname = '$this->uname'";
			$result = $connection->query($sql);

			//Test weather user exists
			if($result->num_rows > 0){
				//exists
			}else{
				$_SESSION["err"] = true;
				return 0;
			}

			//Test if password is correct for user
			$row = $result->fetch_assoc();
			if($row['upass'] == $this->upass){
				$_SESSION["uid"] = $row["id"];
				$_SESSION["uname"] = $row["uname"];
			}else{
				$_SESSION["err"] = true;
				return 0;
			}

			$connection->close();
			//redirect to different page after login
			header("Location: index.php");
		}

		public function createUser(){
		//Creates connection to database
		$connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

		//Insert query for database to user table
		$sql = "INSERT INTO users (uname, upass, emailAddress) VALUES (
			'{$connection->real_escape_string($this->uname)}',
			'{$connection->real_escape_string($this->upass)}',
			'{$connection->real_escape_string($_POST['email'])}')";
			$insert = $connection->query($sql);
			$connection->close();

			//redirect to login page after account is created
			header("Location: login.php");
		}
	}
?>