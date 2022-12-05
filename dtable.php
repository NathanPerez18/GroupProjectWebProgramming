<?php
include 'config.php';
class dtable extends config{

    /*
    All functions in this class create the communication between the table page and the database
    */

    private $saves;

    //Pulls the names of saves for the drop down menu of the table page
    public function pullSaveNames(){
        //creates a connection to the database
        $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

        //saves the user id store in the session array to a variable to be used in the function
        $id = $_SESSION["uid"];
        
        //creates the query for the database to return the names of the users saves
        $sql = "SELECT nameOfSave FROM tableoftables WHERE id = '$id'";
        $result = $connection->query($sql);

        //close database connection after the query data is returned
        $connection->close();

        //determine if any saves where returned, if there were then they are saved in the gobal saves array   
        if($result->num_rows == 0){
            $this->saves[0] = "NoSavesFound";
        }else{
            $check = 0;
            while ($temp = mysqli_fetch_assoc($result)){
                $this->saves[$check] = $temp['nameOfSave'];
                $check += 1;
            }
        }

        //All saved saves are put into cookies for JavaScript to process for the page
        for($i = 0; $i< sizeof($this->saves); $i++){
            setcookie("tableCookie".$i,$this->saves[$i],time()+5);
        }
    }

    //Pulls the selected save from the dropdown menu in table page
    public function fetchSave(){
        //determine wether the selected option is valid
        if($_POST['savedTable'] != "NoSavesFound" && $_POST['savedTable'] != 'Previous saves'){
            // save the saveName into a variable
            $saveName = $_POST['savedTable'];

            //creates a database connection
            $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            
            //saves the user id store in the session array to a variable to be used in the function
            $id = $_SESSION["uid"];

            //create query to pull selected saves
            $sql = "SELECT * FROM tableoftables WHERE nameOfSave = '$saveName' AND id = '$id'";
            $result = $connection->query($sql);

            //close database connection after query data is returned
            $connection->close();

            //transform the returned query data into a usable form
            $formContent = $result->fetch_assoc();

            //set returned data into corresponding cookies
            setcookie('formContentTable1', $formContent['top'] , time()+30);
            setcookie('formContentTable2', $formContent['topColor'] , time()+30);
            setcookie('formContentTable3', $formContent['legs'] , time()+30);
            setcookie('formContentTable4', $formContent['legColor'] , time()+30);
        }
    }

    // Creates a user save
    public function createSave(){
        //checkes if the user has logged in else returns and alert to log in
        if(!empty($_SESSION["uid"])){
            //creates database connection
            $connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

            //pulls the saveName set by the user
            $name = $_COOKIE['saveCookie'];

            //query String to create the save for the user
            $sql = "INSERT INTO tableoftables (id, nameOfSave, top, topColor, legs, legColor) VALUES (
                '{$connection->real_escape_string($_SESSION['uid'])}',
                '{$connection->real_escape_string($name)}',
                '{$connection->real_escape_string($_POST['tabletop'])}',
                '{$connection->real_escape_string($_POST['colorTableTop'])}',
                '{$connection->real_escape_string($_POST['Tlegs'])}',
                '{$connection->real_escape_string($_POST['colorLegs'])}')";
            
            $connection->query($sql);

            //close the database connection
            $connection->close();

            //reloads the page to prevent form resubmission
            header("Location: table.php");
        }else {
            echo "<script>
                    alert('You are not Logged in. Please Login to save designs');
                </script>";
        }       
    }
}
?>