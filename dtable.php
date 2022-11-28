<?php
include 'config.php';
class dtable extends config{

    private $saves;

    public function pullSaves(){
        $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        // session_start();

        $id = $_SESSION["uid"];
        
        $sql = "SELECT * FROM tableoftables WHERE id = '$id'";
        $result = $connection->query($sql);

        $connection->close();
                
        $this->saves = $result->fetch_assoc();

        if(empty($saves)){
            $saves[0] = "No Saves Found";
        }

        setcookie('tableSaves', json_encode($saves));
    }

    public function toDrop(){
        for($i =0; i<$this->save->num_rows; $i++){
            echo '<option selected=selected>'.$saves[i]['id']['uname'].'</option>';
        }
    }

    public function createSave(){
        $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->bdname);
        $name = json_decode(stripslashes($_COOKIE['saveCookie']));
        $sql = "INSERT INTO users (id, nameOfSave, ema) VALUES (
			'{$connection->real_escape_string($_SESSION['uid'])}',
			'{$connection->real_escape_string($name)}',
            '{$connection->real_escape_string($_POST['tabletop'])}',
            '{$connection->real_escape_string($_POST['colorTableTop'])}',
            '{$connection->real_escape_string($_POST['Tlegs'])}',
			'{$connection->real_escape_string($_POST['colorLegs'])}')";
        
        $connection->close();
    }
}
?>