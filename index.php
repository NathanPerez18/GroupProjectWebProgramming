﻿<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>MyKia</title>

    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="index.css">

</head>
<body>

    <div class="header">
        <img src="WebProgrammingLogo.png" alt="MyKia" style="width: 150px; height: 100px;">
        <h2 class="headerTitle"> MyKia</h2>
        <?php
            if(!empty($_SESSION["uname"])){
            echo "<h3 style='padding-right: 25px;'> Welcome, ". $_SESSION["uname"]."</h3>";
            }else {
                echo "<h3 style='padding-right: 25px;'> Welcome, User</h3>";
            }
        ?>
        <!-- <h3 style="padding-right: 6px;"> Welcome, User!!</h3> -->
    </div>

    <div class="navBar">
        <ul class="navList">
            <li class="navItems"><a href="index.php">Home</a></li>
            <li class="navItems"><a href="chair.php">Chair</a></li>
            <li class="navItems"><a href="table.php">Table</a></li>
            <li class="navItems"><a href="contact.php">Contact</a></li>
            <li class="navItems" id="loginBut"><a href="login.php">Login</a></li>
        </ul>
    </div>
    <div class="title">
        <div class="leftLogo"></div>
        <div class="rightLogo"></div>
        <h1>Welcome to MyKia</h1>

    </div>

    <div class="mainContainer">

        <h2>Design your own furniture</h2>
        <h3>Get started by logging in, then start designing</h3>

        <div class="bodyContainer" id="mainPage">
            <!--Place Holder image for table-->
            <img src="IndexTableButton.png" style="width:250px; height:250px; padding: 5px;">
            <h3></h3>
            <!--refrence is to Tables webpage-->
            <a href="table.php" class="button">
                <button>Create a Table</button>
            </a>
        </div>

        <div class="bodyContainer">
            <!--Place Holder image for chair-->
            <img src="IndexChairButton.png" style="width:250px; height: 250px; padding: 5px;">
            <h3></h3>
            <!--refrence is to Chairs webpage-->
            <a href="chair.php" class="button">
                <button>Create a Chair</button>
            </a>
        </div>

    </div>

    <br>
    <div class="decorate1"></div>
    <br>

    <script>
        function Image(identify){
            if(identify=="T"){
            document.getElementById(identify).src = tableTPic[5];
            console.log(tableTPic[5]);
            console.log(6);
            }
            if(identify=="B"){
            document.getElementById(identify).src = tableBPic[4];
            console.log(tableBPic[4]);
            }


        }
    </script>
    <div class="viewSaved"style="text-align:center;">
        <h3>View Designs from other users!</h3>
    </div>

    <div class="savedDesigns">
      <?php 
        //array from js redone in php
        $tableTPic = ["B_SquareTable.png", "B_CircleTable.png", "B_SlatedTable.png",
        "G_SquareTable.png", "G_CircleTable.png", "G_SlatedTable.png",
        "P_SquareTable.png", "P_CircleTable.png", "P_SlatedTable.png"];
        
        $tableBPic = ["B_OneLeg.png", "B_OneColunm4Leg.png", "B_Wheels.png", 
        "G_OneLeg.png", "G_OneColunm4Leg.png", "G_Wheels.png",
        "P_OneLeg.png", "P_OneColunm4Leg.png", "P_Wheels.png"];

        $matPic = ["B_PlasticChair.png", "B_FabricChair.png", "B_MetalChair.png",
        "G_PlasticChair.png", "G_FabricChair.png", "G_MetalChair.png",
        "P_PlasticChair.png", "P_FabricChair.png", "P_MetalChair.png"];
    
       $legPic = ["B_ShortChairLegs.png", "B_longChairLegs.png", "B_OneLeg.png", 
        "G_ShortChairLegs.png", "G_longChairLegs.png", "G_OneLeg.png",
        "P_ShortChairLegs.png", "P_longChairLegs.png", "P_OneLeg.png"];

        //Database connection Variables
        $dbhost = "localhost";
        $dbuser = "Admin";
        $dbpass = "1234";
        $dbname = "admin";
 
        ?>

        <?php $count=0; while($count<4){ ?>
        <div class="innerSavedDesigns" >
        <?php

        //Will randomly chose to pull from either the chair table or the tableoftables table
        $choice = rand(0,1);

        //Will perform an sql qurey of the table 
        if($choice==0)
        {
            $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            $sql = "SELECT rand(),top,topColor,legs,legColor FROM tableoftables ORDER BY 1 limit 1";
            $result = $connection->query($sql);
            $connection->close();

            //If the table is empty, makes a random picture
            if($result->num_rows == 0 )
            {
                $topImage = $tableTPic[rand(0,8)];
                $bottomImage = $tableBPic[rand(0,8)];
            }
            //When there is a entry in the table
            else
            {
                $temp = mysqli_fetch_assoc($result);
           
                $topImage = $tableTPic[$temp['top']+$temp['topColor']*3];
                $bottomImage = $tableBPic[$temp['legs']+$temp['legColor']*3];
            }
        }
        else
        {
          $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            $sql = "SELECT rand(),material,materialColor,legs,legColor FROM chair ORDER BY 1 limit 1";
            $result = $connection->query($sql);
            $connection->close();

            //If the table is empty, makes a random picture
            if($result->num_rows == 0 )
            {
                $topImage = $matPic[rand(0,8)];
                $bottomImage = $legPic[rand(0,8)];
            }
            //When there is a entry in the table
            else
            {
                $temp = mysqli_fetch_assoc($result);
           
                $topImage = $matPic[$temp['material']+$temp['materialColor']*3];
                $bottomImage = $legPic[$temp['legs']+$temp['legColor']*3];
            }
        }
        ?>
            <img src="<?php echo $topImage?>" style="width:520px; height:260px;"><!--top image-->
            
            <img  src="<?php echo $bottomImage?>" style="width:520px; height:260px;"><!--bottom image-->
        </div>
        <?php $count++; } ?>

    </div>


    <div class="footerBar">
    <div class="insideFooterTitle">
                <h2>Find Page</h2>
        </div>
        <div class="insideFooter">
        <p><a href="index.php">Home</a></p>
        <p><a href="login.php">Login</a></p>
        <p><a href="contact.php">Contact Us</a></p>
        <p>MyKia &copy</p>
        <p>Copyright LRNJ 2022<span>&copy;</span></p>
        </div>
    </div>

</body>
</html>