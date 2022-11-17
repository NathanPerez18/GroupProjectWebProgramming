﻿<?php
include 'dlogin.php';
if(!empty($_POST)){
    $account = new dlogin($_POST['uname'], $_POST['upass']);
    $account->createUser();
}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>MyKia</title>

    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="login.css">

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

    <div class="mainContainer">

        <h1 style="text-align: center;">Create an Account</h1>

        <form action="" method="post">
            <div class="imgContainer">
                <img src="loginIcon.png" alt="Avatar" class="avatar">
            </div>

            <div class="bodyContainer">

                <label for="fname"><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="fname" required>

                <label for="lname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter last Name" name="lname" required>

                <label for="email"><b>Email Address</b></label>
                <input type="text" placeholder="Enter Email Address" name="email" required>

                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="upass" required>

                <button type="submit">Create Account</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="bodyContainer" style="background-color: #f1f1f1; border-radius: 2%;">
                <button type="button" class="cancelbtn" >Cancel</button>
            </div>

        </form>

    </div>

    <div class="footerBar">
        <p>Copyright LRNJ 2022<span>&copy;</span></p>
    </div>

</body>
</html>