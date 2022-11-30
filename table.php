<?php
    include 'dtable.php';
    session_start();

    $table = new dtable();
    
    if(!empty($_SESSION["uid"])){
        $table->pullSaveNames();
    }
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>MyKia</title>

    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="table.css">

</head>
<body onload="resetClick('designT')">

    <script src="updateTableDesign.js"></script>

    <div class="header">
        <img src="WebProgrammingLogo.png" alt="MyKia" style="width: 150px; height: 100px;">
        <h2> MyKia</h2>
        <?php
            if(!empty($_SESSION["uname"])){
            echo "<h3 style='padding-right: 6px;'> Welcome, ". $_SESSION["uname"]."!</h3>";
            }else {
                echo "<h3 style='padding-right: 6px;'> Welcome, User!!</h3>";
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

        <!--two buttons at the top: reset or save-->

        <form method="POST">
            <a href="#">
                <button type="button" class="createTable" onclick="resetClick('designT')">Reset to New Design</button>
            </a>
            <a href="#">
                <input type="submit" form="designT" class="saveTable" value="saveDesign" onclick="saveClick()"></input>
            </a>
            <?php
                if(!empty($_POST["saveDesign"])){
                    $table->createSave();
                }
            ?>
        </form>
        <br>
        <br>
        <br>

        <!--dropdown menu for the user's previously saved designs-->
        <form method="POST">
            <!-- add: onchange='if(this.value != 0) {this.form.submit();}' -->
            <select name="savedTable" class="savedMenu">
                <option selected=selected>Previous saves</option>
                <?php
                    $table->toDrop();
                ?>
            </select>
        </form>

        <!--box where the changing image of the chair should be,
            for now just a placeholder-->
        <div class="tableDesigning">
            <img id="tableT" src="testTable1.jpg" class="image">
            <img id="tableB" src="testTable1.jpg" class="image">


        </div>

        <br>
        <br>

        <hr>

        <br>
        <br>

        <!--option menu to change the design,
            note: option values were chosen arbitrarily and are
             subject to change  class="radio-toolbar" -->
        <div class="tableDesignOptions" >
            <form id="designT" method="post" action="">
                <!--title of form-->
                <legend>Design Options</legend>

                <!--options to change the table top-->
                <p>
                    <label>Change Table Top<br></label>
                    <select name="tabletop" onchange="topType(this.value);">
                        <option id="square" value=0 selected=selected>Square</option>
                        <option id="circle" value=1 >Circle</option>
                        <option id="slats" value=2 >Slatted</option>
                    </select>
                </p>

                <!--options to change the table top color-->
                <p>
                    <label>Color<br></label>
                    <input type="radio" id="twhite" name="colorTableTop" value="0" onclick="topColor('twhite')" checked><span class="colorWhite">color</span>
                    <input type="radio" id="tgrey" name="colorTableTop" value="1" onclick="topColor('tgrey')"><span class="colorGrey">color</span>
                    <input type="radio" id="tblack" name="colorTableTop" value="2" onclick="topColor('tblack')"><span class="colorBlack">color</span>
                </p>

                <!--options to change the legs of the table-->
                <p>
                    <label>Change Legs<br></label>
                    <select name="Tlegs" onchange="tLegType(this.value);">
                        <option id="cmetal" value="0" selected=selected>Classic Metal</option>
                        <option id="claw" value="1">Clawfoot</option>
                        <option id="wheel" value="2">Wheels</option>
                    </select>
                </p>

                <!--options to change the leg color-->
                <p>
                    <label>Color<br></label>
                    <input type="radio" name="colorLegs" id="bwhite" value="0" onclick="tLegColor('bwhite')" checked><span class="colorWhite">color</span>
                    <input type="radio" name="colorLegs" id="bgrey" value="1" onclick="tLegColor('bgrey')"><span class="colorGrey">color</span>
                    <input type="radio" name="colorLegs" id="bblack" value="2" onclick="tLegColor('bblack')"><span class="colorBlack">color</span>
                </p>

            </form>
        </div>


        <!--deleted third div because it wasn't necesary -->

    </div>

    <br>
    <br>

    <hr>

    <!--pretend contact info for aesthetic purposes-->
    <div class="footerBar">
        <p>Contact us for help: <br>fake.email@gmail.com</p>
    </div>

    <hr>

</body>
</html>