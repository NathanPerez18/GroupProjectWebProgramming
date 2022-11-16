﻿<!DOCTYPE html>

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
    <div class="title">
        <div class="leftLogo"></div>
        <div class="rightLogo"></div>
        <h1>Welcome to MyKia</h1>
        <p>Get started by logging in, then start designing</p>

    </div>

    <div class="mainContainer">

        <h2>Design your own furnature</h2>

        <div class="bodyContainer" id="mainPage">
            <!--Place Holder image for table-->
            <img src="https://images.vexels.com/media/users/3/192849/isolated/lists/e626a584464b1e532662560df286fa10-round-classic-side-table-silhouette-perspective.png">
            <h3></h3>
            <!--refrence is to Tables webpage-->
            <a href="table.php" class="button">
                <button>Create a Table</button>
            </a>
        </div>

        <div class="bodyContainer">
            <!--Place Holder image for chair-->
            <img src="https://images.vexels.com/media/users/3/189271/isolated/lists/d91d870be0001128a3a7513059578553-office-ergonomic-chair-silhouette.png">
            <h3></h3>
            <!--refrence is to Chairs webpage-->
            <a href="chair.php" class="button">
                <button>Create a Chair</button>
            </a>
        </div>

    </div>

    <br>

    <div class="footerBar">
        <hr style="height: 3px;background-color: black;">
        <p>FOOTER TEST TEXT</p>
    </div>

</body>
</html>