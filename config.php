<?php
class static config{

    // Creates a database connection
    private $dbhost = "localhost";
    private $dbuser = "Admin";
    private $dbpass = "";
    private $dbname = "admin";

    private $connection = mysqli_connect ($dbhost,$dbuser,$dbpass,$dbname);

    if (mysqli_connect_errno()){
        die("Database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
    }

}
?>