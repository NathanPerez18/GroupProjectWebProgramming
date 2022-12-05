<?php
include 'config.php';
class chair extends config{
    private $saves;

    public function pullSaveNames(){
        $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

        $id = $_SESSION["uid"];
        
        $sql = "SELECT nameOfSave FROM chair WHERE id = '$id'";
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
            setcookie("chairCookie".$i,$this->saves[$i],time()+60*5);
        }
    }

    public function fetchSave(){
        if($_POST['savedTable'] != "NoSavesFound" && $_POST['savedTable'] != 'Previous saves'){
            $saveName = $_POST['savedTable'];
            $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);


			$id = $_SESSION["uid"];

			$sql = "SELECT * FROM chair WHERE nameOfSave = '$saveName' AND id = '$id'";
            $result = $connection->query($sql);

            $connection->close();

            $formContent = $result->fetch_assoc();
         

            setcookie('formContentChair1', $formContent['material'] , time()+30);
            setcookie('formContentChair2', $formContent['materialColor'] , time()+30);
            setcookie('formContentChair3', $formContent['legs'] , time()+30);
            setcookie('formContentChair4', $formContent['legColor'] , time()+30);
        }
    }


    public function createSave(){
        if(!empty($_SESSION["uid"])){
            $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            $name = $_COOKIE['saveCookie'];

            $sql = "INSERT INTO chair (id, nameOfSave, material, materialColor, legs, legColor) VALUES (
                '{$connection->real_escape_string($_SESSION['uid'])}',
                '{$connection->real_escape_string($name)}',
                '{$connection->real_escape_string($_POST['material'])}',
                '{$connection->real_escape_string($_POST['colorUpholstery'])}',
                '{$connection->real_escape_string($_POST['legs'])}',
                '{$connection->real_escape_string($_POST['colorLegs'])}')";
            
            $connection->query($sql);

            $connection->close();

            header("Location: chair.php");
        }else {
            echo "<script>
                    alert('You are not Logged in. Please Login to save designs');
                </script>";
        }
    }
}
?>