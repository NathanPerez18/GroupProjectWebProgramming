<?php
include 'config.php';
class dtable extends config{

    private $saves;

    public function pullSaveNames(){
        $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

        $id = $_SESSION["uid"];
        
        $sql = "SELECT nameOfSave FROM tableoftables WHERE id = '$id'";
        $result = $connection->query($sql);

        $connection->close();

        if($result->num_rows == 0){
            $this->saves[0] = "No Saves Found";
        }else{
            $check = 0;
            while ($temp = mysqli_fetch_assoc($result)){
                $this->saves[$check] = $temp['nameOfSave'];
                $check += 1;
            }
        }
        for($i = 0; $i< sizeof($this->saves); $i++){
            setcookie("nameOfSave".$i,$this->saves[$i]);
        }
    }

    public function fetchSave(){
        if($_POST['savedTable'] != "NoSavesFound" && $_POST['savedTable'] != '*TO BE FILLED IN*'){
            $saveName = $_POST['savedTable'];
            $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

            $sql = "SELECT * FROM tableoftables WHERE nameOfSave = '$saveName'";
            $result = $connection->query($sql);

            $connection->close();

            $formContent = $result->fetch_assoc();
            
            setcookie('formContent', json_encode($formContent), time()+2);
        }
    }

    public function toDrop(){
        setcookie('tableSaves', json_encode($this->saves));
    }

    public function createSave(){
        $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        $name = $_COOKIE['saveCookie'];

        $sql = "INSERT INTO tableoftables (id, nameOfSave, top, topColor, legs, legColor) VALUES (
			'{$connection->real_escape_string($_SESSION['uid'])}',
			'{$connection->real_escape_string($name)}',
            '{$connection->real_escape_string($_POST['tabletop'])}',
            '{$connection->real_escape_string($_POST['colorTableTop'])}',
            '{$connection->real_escape_string($_POST['Tlegs'])}',
			'{$connection->real_escape_string($_POST['colorLegs'])}')";
        
        $connection->query($sql);

        $connection->close();

        header("Location: table.php");       
    }
}
?>