<?php
    include 'dchair.php';
    session_start();

    $chair = new chair();

    if(!empty($_SESSION["uid"])){
        $chair->pullSaveNames();
    }

    if(array_key_exists('saveButton', $_POST)){
        $chair->createSave();
    }
   /* if(array_key_exists('savedTable', $_POST)){
        $chair->fetchSave();
    }*/
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>MyKia</title>

    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="chair.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body onload="resetClick('designC')">

    <script src="updateChairDesign.js"></script>

    <div class="header">
        <img src="WebProgrammingLogo.png" alt="MyKia" style="width: 150px; height: 100px;">
        <h2 class="headerTitle"> MyKia</h2>
        <?php
            if(!empty($_SESSION["uname"])){
            echo "<h3 style='padding-right: 25px;'> Welcome, ". $_SESSION["uname"]." </h3>";
            }else {
                echo "<h3 style='padding-right: 25px;'> Welcome, User  </h3>";
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

    <!--mainContainer division contains everything
        except the footer division at the bottom-->
    <div class="mainContainer">

        <!--three buttons at the top: create reset or save-->
        <form method="POST" style="padding-left:30px">
            <button type="button" class="createChair" onclick="resetClick('designC')">Reset to New Design</button>
       
            <input type="submit" name="saveButton" class="saveChair" form="designC" onclick="saveClick()" value = "Save Design"></input>
        </form>

        <br>
        <br>
        <br>

        <!--dropdown menu for the user's previously saved designs-->
        <form method="POST" id="saveForm" style="padding-left:30px">
            <select name="savedChair" class="savedMenu" id="saveDropdown" onclick="updateDropdown()">
                <option>Previous saves</option>
            </select>
        </form>
        <!--box where the changing image of the chair should be,
            for now just a placeholder-->
        <div class="chairDesigning">
            <img id="chairM" src="testTable1.jpg" class ="image" style="height:390px;">
            <img id="chairL" src="testTable1.jpg" class="image" style="height:130px;">


            
        </div>

        <br>
        <br>

        <hr>

        <br>
        <br>

        <!--option menu to change the design,
            note: option values were chosen arbitrarily and are
            subject to change -->
        <div class="chairDesignOptions">
            <form  id="designC" method="post" action="">
                <!--title of form-->
                <legend>Design Options</legend>

                <!--options to change the material of the chair-->
                <p>
                    <label>Change Material<br></label>
                    <select id="topMat" name="material" onchange="materialType(this.value);"><!--onChange="materialType(this.value)"-->
                        <option id="plastic" value="0" selected=selected>Plastic</option>
                        <option id="fabric" value="1" >Fabric</option>
                        <option id="metal" value="2" >Metal</option>
                    </select> 
                  
                </p>

                <!--options to change the material color-->
                <p>
                    <label>Color<br></label>
                    <input type="radio" name="colorUpholstery" id="mB" value="0" onclick="materialColor('mB')" checked><span class="colorB">color</span>
                    <input type="radio" name="colorUpholstery" id="mG" value="1" onclick="materialColor('mG')"><span class="colorG">color</span>
                    <input type="radio" name="colorUpholstery" id="mP" value="2" onclick="materialColor('mP')"><span class="colorP">color</span>
                </p>

                <!--options to change the legs of the chair-->
                <p>
                    <label>Change Legs<br></label>
                    <select id="legShape" name="legs" onchange="legType(this.value);">
                        <option name="legs" id="shortLegs" value="0" selected=selected>Short</option>
                        <option name="legs" id="longLegs" value="1" >Long</option>
                        <option name="legs" id="single" value="2" >Single</option>
                    </select>
                </p>

                <!--options to change the leg color-->
                <p>
                    <label>Color<br></label>
                    <input type="radio" name="colorLegs" id="lB" value="0" onclick="legColor('lB')" checked><span class="colorB">color</span>
                    <input type="radio" name="colorLegs" id="lG" value="1" onclick="legColor('lG')"><span class="colorG">color</span>
                    <input type="radio" name="colorLegs" id="lP" value="2" onclick="legColor('lP')"><span class="colorP">color</span>
                </p>

            </form>
        </div>


        <!--deleted third div because it wasn't necesary -->

    </div>
<!-- 
    <br>
    <br> -->



    <!--pretend contact info for aesthetic purposes-->
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
<script>
$(function() { 
	$("#saveForm").change(function() { 
        var pair = $("#saveForm").serialize();
        pair = pair.split("=");
        let a = pair[1];
        
	$.ajax({ 
		'url':'fetchSaveC.php', 
		'type':'POST', 
		'data': {'savedTable':a}, 
		'success':function(e) { 
            updateDisplay();
		} 
	}); 
	return false; 
	}); 
}); 
</script>
</body>
</html>