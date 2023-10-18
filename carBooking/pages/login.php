<?php

    if(!isset($_SESSION)) 
    {
        session_start();
    }
    if (isset($_SESSION['userLoggedIn'])) 
    {
        header("Location: ../main.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../fonts/css/all.css">

</head>

<body>


    <div class="main">

        <div class="userForm">

            <h2>LOGIN</h2>

            <form class="LoginForm form" method="post">

                <p>
                    <label for="username" class="text"> <i class="fa-solid fa-user"></i> USERNAME</label>
                    <input type="text" id="username" name="username" class="textbox" required>
                </p>

                <p>
                    <label for="password" class="text"><i class="fa-solid fa-lock"></i> PASSWORD</label>
                    <input type="password" name="password" id="password" class="textbox" required>
                </p>

                <input type="submit" name="submit" id="submit"><br>
                <label for="submit" class="loginBtn">LOGIN</label>
            
            
            </form>

            

            <div class="reset">

                <i>Don't have acoount?</i>
                <a href="signup.php" class="signup">Sigh up</a>

                <?php


                    include("../connection.php");

                    if (isset($_POST['submit'])) 
                    {
                        $uname = $_POST['username'];
                        $pass = $_POST['password'];

                        $que = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";

                        $res = mysqli_query($conn, $que);

                        if (mysqli_num_rows($res) == 1) {
                            session_start();
                            $_SESSION['userLoggedIn'] = $uname;
                            if (isset($_GET['brand'])) 
                            {
                                header("Location: ../brands/carDetails.php?brand=$_GET[brand]");
                            }
                            else 
                            {
                                header("Location: ../main.php");
                            }
                        } else {
                            echo "<h4 class='inncorrect'><i class='far fa-times-circle'></i> Incorrect Username OR Password</h4>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>