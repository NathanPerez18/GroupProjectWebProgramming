<?php
class chair extends config{


/*
Want to store the Primary id of the user, 
the name of the save, a point on a two d array twice.

Variables:
primaryKey: Primary id of the user
nameOfSave: User defined name of the save
material: Material of the top
$rowForQueriedData: The data 
->: Call operator for inherited methods

*/
	function saveChair(){
	$sql = "INSERT INTO chair (primaryKey, nameOfSave, material, legsOfChair)";
	$result = $connection->query($sql);
	$rowForQueriedData = $result->fetch_assoc();
	}

	$sql = "INSERT INTO users (uname, upass) VALUES (
			'{$connection->real_escape_string($_POST['uname'])}',
			'{$connectino->real_escape_string($_POST['upass'])}'";
				$insert = $connection->query($sql);


}
?>