<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Foget Password</title>
    <link rel="stylesheet" href="../css/forget.css">
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src="../JS/forget.js" defer></script>    
</head>
<body>
    <div class="forgetBox">
        <form method="POST">
                <i class="cancel fa-regular fa-circle-xmark"></i>
                <ul>
                    <li>
                        <label for="Adminusername"><i class="fa-solid fa-user"></i></label>
                        <input type="text" class="textbox" name="Adminusername" id="Adminusername" placeholder="Enter USERNAME" required>
                    </li>

                    <li>
                        <input type="submit" name='Adminsubmit' id="Adminsubmit">
                        <label for="Adminsubmit" class="loginBtn">Submit</label>
                    </li>
                </ul>
                <?php

                include("../connection.php");

                if (isset($_POST['Adminsubmit'])) {
                    $uname = $_POST['Adminusername'];

                    $que = "SELECT * FROM admin WHERE username='$uname'";

                    $res = mysqli_query($conn, $que);



                    if (mysqli_num_rows($res) == 1) {

                        $p = mysqli_fetch_assoc($res)['password'];
                        echo "<h4>$p</h4>";
                    } else {
                        echo "<h4><i class='far fa-times-circle'></i> Incorrect Username </h4>";

                    }
                }

                ?>
        </form>
    </div>
</body>
</html>