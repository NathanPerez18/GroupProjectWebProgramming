<?php
include 'dlogin.php';
if(!empty($_POST)){
    $account = new dlogin($_POST['uname'], $_POST['upass']);
    $account->login();
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
        <h2 class="headerTitle"> MyKia</h2>
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

        <h1 style="text-align: center;">Login</h1>

        <form action="" method="post">
            <div class="imgContainer">
                <img src="loginIcon.png" alt="Avatar" class="avatar">
            </div>

            <div class="bodyContainer">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="upass"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="upass" required>
                
                <p id="usererror" style="text-color: red;"></p>
               
               <?php
                    if(!empty($_POST)){
                        if($_SESSION["err"]){
                            echo '<script type="text/javascript"> document.getElementById("usererror").innerHTML = "Username or Password is not correct." </script>';
                            echo '<script type="text/javascript"> document.getElementById("usererror").style.color = "red" </script>';
                        }
                }
                ?>

                <button type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="bodyContainer" style="background-color: #f1f1f1; border-radius: 2%;">
                <button type="button" class="cancelbtn" href="index.php">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>

            <div class="bodyContainer">
                <span class="psw" style="padding-top: 3px;">Don't Have an Account? <a href="createAccount.php">Create One!</a></span>
            </div>
        </form>

    </div>

    <div class="footerBar">
        <p>Copyright LRNJ 2022<span>&copy;</span></p>
    </div>

</body>
</html>