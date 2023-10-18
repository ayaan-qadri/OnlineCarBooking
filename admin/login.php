<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="fonts/css/all.css" <?php echo time()?>>

</head>

<body>

    <div class="main">

        <div class="userForm">
            <div class="headline">
                <h2>ADMIN</h2>
                <h3>LOGIN</h3>
            </div>

            <div class="fNf">
                <form method="POST" class="LoginForm form">

                <p>
                    <label for="username" class="text"> <i class="fa-solid fa-user"></i> USERNAME</label>
                    <input type="text" name="username" id="username" class="textbox" required>
                </p>

                <p>
                    <label for="password" class="text"><i class="fa-solid fa-lock"></i> PASSWORD</label>
                    <input type="password" name="password" id="password" class="textbox" required>
                </p>

                <input type="submit" name='submit' id="submit"><br>
                <label for="submit" class="loginBtn">LOGIN</label>

                
            </form>

            <div method="post" class="forgetP">
                <a href="other/forget.php">Forgot Password?</a>
            </div>
            

            <?php


                include("connection.php");

                if (isset($_POST['submit'])) {
                    $uname = $_POST['username'];
                    $pass = $_POST['password'];

                    $que = "SELECT * FROM admin WHERE username='$uname' AND password='$pass'";

                    $res = mysqli_query($conn, $que);

                    if (mysqli_num_rows($res) == 1) 
                    {
                        session_start();
                        $_SESSION['AdminLoginUsername'] = $uname;
                        header("Location: admin/admin.php");
                    } else {
                        echo "<h4><i class='far fa-times-circle'></i>Incorrect Username OR Password</h4>";
                    }
                }
            ?>
            </div>
        </div>
    </div>

</body>

</html>

