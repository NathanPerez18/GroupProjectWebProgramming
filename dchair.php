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

	//FILLMEUPDADDY PLEASE FILL ME IN ;)
	//The post variable will be directly 
	$sql = "INSERT INTO chair (primaryKey,nameOfSave,material,materialColor,legs,legsColor) VALUES (
			'{$connection->real_escape_string($_SESSION['uid'])}',
			'{$connection->real_escape_string($_POST['nameOfSave'])}',
			'{$connection->real_escape_string($_POST['FILLMEUPDADDY'])}',
			'{$connection->real_escape_string($_POST['FILLMEUPDADDY'])}',
			'{$connection->real_escape_string($_POST['FILLMEUPDADDY'])}',
			'{$connection->real_escape_string($_POST['FILLMEUPDADDY'])}',
			";
			$insert = $connection->query($sql);

}
?>