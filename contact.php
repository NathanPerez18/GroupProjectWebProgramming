<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>MyKia</title>

    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="contact.css">

</head>
<body>

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

    <div class="mainContainer">
        <h1>Meet Our Developers</h1>

        <div class="bodyContainer">
            <div class="image">
                <img src="coolDudes.jpg">
            </div>
            <div class="text">
                <h2>Logan Butler: 100828103</h2>
                <p>
                    2nd year Software Engineering student at Ontario Tech University<br>
                    About me:
                    <ul>
                        <li>
                            Favourite color - Purple
                        </li>
                        <li>
                            Favourite snack - Whatever I have on hand
                        </li>
                        <li>
                            Favourite quote - "Ah gravity, thou art a heartless b-" - The Big Bang Theory
                        </li>
                    </ul>
                </p>
                <p>I can be reached at <a href="#">logan.butler@ontariotechu.net</a> </p>
            </div>
        </div>

        <div class="bodyContainer">
            <div class="image">
                <img src = "coolPeeps.png"> 
            </div>
            <div class="text">
                <h2>Nathan Perez: 100754066</h2>
                <p>
                    2nd year Software Engineering student at Ontario Tech University<br>
                    About me:  
                    <ul>
                        <li>
                            Favourite color - Turquoise
                        </li>
                        <li>
                            Favourite snack - Nacho chips and shredded cheese
                        </li>
                        <li>
                            Favourite quote - "I don't want to survive, I want to live" - Wall-E
                        </li>
                    </ul> 
                </p>
                <p>I can be reached at <a href="#">nathan.perez@ontariotechu.net</a> </p>
            </div>
        </div>

        <div class="bodyContainer">
            <div class="image">
                <img src="coolDudes.jpg">
            </div>
            <div class="text">
                <h2>Juliano Falotico: 100658311</h2>
                <p>
                    2nd year Software Engineering student at Ontario Tech University<br>
                    About me:
                    <ul>
                        <li>
                            Favourite color - Red
                        </li>
                        <li>
                            Favourite snack - Chocolate
                        </li>
                        <li>
                            Favourite quote - "I have come here to chew bubblegum and kick a-, and I'm all out of bubble gum" - They Live
                        </li>
                    </ul>
                </p>
                <p>I can be reached at <a href="#">juliano.falotico@ontariotechu.net</a> </p>
            </div>
        </div>

        <div class="bodyContainer">
            <div class="image">
                <img src = "coolPeeps.png">
            </div>
            <div class="text">
                <h2>Rivka Sagi: 100780926</h2>
                <p>
                    2nd year Software Engineering student at Ontario Tech University<br>
                    About me:
                    <ul>
                        <li>
                            Favourite color - Purple
                        </li>
                        <li>
                            Favourite snack - Strawberries
                        </li>
                        <li>
                            Favourite quote - "It is possible to commit no mistakes and still lose. 
                            That is not weakness, that is life" - Captain Jean-Luc Picard
                        </li>
                    </ul>
                </p>
                <p>I can be reached at <a href="#">rivka.sagi@ontariotechu.net</a> </p>
            </div>
        </div>
    </div>

    <div class="footerBar">
        <p>FOOTER TEST TEXT</p>
    </div>

</body>
</html>