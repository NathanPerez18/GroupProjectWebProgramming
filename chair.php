﻿<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>MyKia</title>

    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="chair.css">

</head>
<body>

    <script src="updateDesign.js"></script>
    <script src="updateChairDesign.js"></script>

    <div class="header">
        <img src="WebProgrammingLogo.png" alt="MyKia" style="width: 150px; height: 100px;">
        <h2> MyKia</h2>
        <h3 style="padding-right: 6px;"> Welcome, User!!</h3>
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
        <a href="#">
            <button type="button" class="createChair" onclick="createNewClick()">Create New Design!</button>
        </a>
        <a href="#">
            <button type="button" class="resetChair" onclick="resetClick()">Reset Design</button>
        </a>
        <a href="#">
            <button type="button" class="saveChair">Save Design</button>
        </a>

        <br>
        <br>
        <br>

        <!--dropdown menu for the user's previously saved designs-->
        <select name="savedChair" class="savedMenu">
            <option>First_save</option>
            <option>Second_save</option>
        </select>

        <!--box where the changing image of the chair should be,
            for now just a placeholder-->
        <div class="chairDesigning">
            <img id="chairM" src="testChair1.jpg" style="width:100px; height: 100px;">
            <br>
            <img id="chairL" src="testChair2.jpg" style = "width: 100px; height:100px;">


            
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
            <form method="" action="">
                <!--title of form-->
                <legend>Design Options</legend>

                <!--options to change the material of the chair-->
                <p>
                    <label>Change Material<br></label>
                    <select>
                        <option id="plastic" value="0" onclick="materialType('plastic')">Plastic</option>
                        <option id="wood" value="1" onclick="materialType('wood')">Wood</option>
                        <option id="metal" value="2" onclick="materialType('metal')">Metal</option>
                    </select>
                </p>

                <!--options to change the material color-->
                <p>
                    <label>Color<br></label>
                    <input type="radio" name="colorUpholstery" id="mwhite" value="0" onclick="materialColor('mwhite')"><span class="colorWhite">color</span>
                    <input type="radio" name="colorUpholstery" id="mgrey" value="1" onclick="materialColor('mgrey')"><span class="colorGrey">color</span>
                    <input type="radio" name="colorUpholstery" id="mblack" value="2" onclick="materialColor('mblack')"><span class="colorBlack">color</span>
                </p>

                <!--options to change the legs of the chair-->
                <p>
                    <label>Change Legs<br></label>
                    <select>
                        <option>Classic Metal</option>
                        <option>Clawfoot</option>
                        <option>Wheels</option>
                    </select>
                </p>

                <!--options to change the leg color-->
                <p>
                    <label>Color<br></label>
                    <input type="radio" name="colorLegs" value="white"><span class="colorWhite">color</span>
                    <input type="radio" name="colorLegs" value="grey"><span class="colorGrey">color</span>
                    <input type="radio" name="colorLegs" value="black"><span class="colorBlack">color</span>
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