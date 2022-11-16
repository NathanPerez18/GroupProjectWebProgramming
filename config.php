<?php
class config{

    // Creates a database connection
    private $dbhost = "localhost";
    private $dbuser = "Admin";
    private $dbpass = "1234";
    private $dbname = "admin";
    protected $connection;

    public static function start(){
        // session_start();
    }

    public static function connect(){
        $connection = mysqli_connect ($dbhost,$dbuser,$dbpass,$dbname);

        if (mysqli_connect_errno()){
            die("Database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
        }
    }

}
?>