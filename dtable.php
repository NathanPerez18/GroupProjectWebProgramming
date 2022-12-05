<?php
include 'config.php';
class dtable extends config{

    private $saves;

      /*
        pullSaveNames() takes no params. The function, opens a DB connection,
        runs an SQL query on the table 'tableoftables', then outputs the 
        correct saved designs from the table and stores them in cookies
        to later be used with JS
    */
    public function pullSaveNames(){
        $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

        $id = $_SESSION["uid"];
        
        $sql = "SELECT nameOfSave FROM tableoftables WHERE id = '$id'";
        $result = $connection->query($sql);

        $connection->close();
        
        if($result->num_rows == 0){
            $this->saves[0] = "NoSavesFound";
        }else{
            $check = 0;
            while ($temp = mysqli_fetch_assoc($result)){
                $this->saves[$check] = $temp['nameOfSave'];
                $check += 1;
            }
        }
        for($i = 0; $i< sizeof($this->saves); $i++){
            setcookie("tableCookie".$i,$this->saves[$i],time()+60*5);
        }
    }

      /*
        fetchSaves() takes no params. The function, opens a DB connection,
        runs an SQL query on the table 'tablesoftables', then outputs the 
        correct design options that are saved in the table and stores them in cookies
        to later be used with JS
    */
    public function fetchSave(){
        if($_POST['savedTable'] != "NoSavesFound" && $_POST['savedTable'] != 'Previous saves'){
            $saveName = $_POST['savedTable'];
            $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            $id = $_SESSION["uid"];

            $sql = "SELECT * FROM tableoftables WHERE nameOfSave = '$saveName' AND id = '$id'";
            $result = $connection->query($sql);

            $connection->close();

            $formContent = $result->fetch_assoc();

            setcookie('formContentTable1', $formContent['top'] , time()+30);
            setcookie('formContentTable2', $formContent['topColor'] , time()+30);
            setcookie('formContentTable3', $formContent['legs'] , time()+30);
            setcookie('formContentTable4', $formContent['legColor'] , time()+30);
        }
    }
    /*
        createSave() takes no params. The function, opens a DB connection,
        runs an SQL query on the table 'tableoftables' to insert the relevant information 
        into the 'chair' table that contains the; user id, save name, an int for tabletop type,
        an int for tabletop color, and int for leg shape, and an int for leg color.
    */
    public function createSave(){
        if(!empty($_SESSION["uid"])){
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
        }else {
            echo "<script>
                    alert('You are not Logged in. Please Login to save designs');
                </script>";
        }       
    }
}
?>