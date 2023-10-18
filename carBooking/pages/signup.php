<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="../fonts/css/all.css">

</head>

<body>


    <div class="main">

        <div class="userForm">

            <h2>SING UP</h2>

            <form class="LoginForm form" method="post">

                <p>
                    <label for="username" class="text"> <i class="fa-solid fa-user"></i> USERNAME</label>
                    <input type="text" name="username" id="username" class="textbox" required>
                </p>

                <p>
                    <label for="password" class="text"><i class="fa-solid fa-lock"></i> PASSWORD</label>
                    <input type="password" name="password" id="password" class="textbox" required>
                </p>

                <p>
                    <label for="number" class="text"><i class="fa-solid fa-phone"></i> MOBILE NUMBER</label>
                    <input type="text" name="number" id="number" class="textbox" required>
                </p>

                <p>
                    <label for="email" class="text"><i class="fa-solid fa-envelope"></i> EMAIL</label>
                    <input type="email" name="email" id="email" class="textbox" required>
                </p>

                <p>
                    <input type="submit" name="submit" id="submit">
                    <label for="submit" class="signupBtn">SIGN UP</label>
                </p>

            <?php
                include("../connection.php");
                $result;
                if (isset($_POST['submit'])) 
                {
                    $password = $_POST['password'];
                    $number = $_POST['number'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];

                    $que = "INSERT INTO user VALUES(null,'$password','$number','$email','$username')";

                    $forUsername = mysqli_query($conn,"SELECT username from user WHERE username='$username'");
                    $forNumber = mysqli_query($conn,"SELECT mobile_no from user WHERE mobile_no='$number'");
                    $forEmail = mysqli_query($conn,"SELECT email from user WHERE email='$email'");

                    

                    if (mysqli_num_rows($forUsername) >= 1)
                    {
                        echo "<h5>Username alredy taken</h5>";
                    }
                    elseif (mysqli_num_rows($forNumber) >= 1) {
                        echo "<h5>Number alredy taken</h5>";
                    } 
                    elseif (mysqli_num_rows($forEmail) >= 1)
                    {
                        echo "<h5>Email alredy taken</h5>";
                    }
                    else {
                        $result = mysqli_query($conn, $que);
                        echo "<style>
                            .doneBlock
                            {
                                display:block;
                            }
                        </style>";
                }
            }
            ?>
            
            </form>
<div class="reset">
                <i>Have a acoount?</i>
                <a href="login.php">Login</a>
            </div>
            
        </div>

        

               
    </div>
    
    <div class = "doneBlock">
            <h4 class='regDone'><i class='done fa-solid fa-circle-check'></i>
        Successfully Registered
        <a href='login.php'>Login<span class='arw'>>>> </span></a>
    </h4>
    </div>

        
</body>

</html>