<!DOCTYPE html>
<html lang="en">

    <?php
        if (!isset($_SESSION)) 
        {
            session_start();
        }
        if (!isset($_SESSION['AdminLoginUsername'])) 
        {
            header("Location: ../login.php");
        }
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/account.css">
    <script src="../JS/account.js" defer></script>
    
    

</head>

<body>

    <?php
        include 'sidebar.php';

        include("../connection.php");

    ?>


    <div class='mainAddUser'>
        <div class="addUser">

            <h2>Add User</h2>
    
    <form method="post">

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
                    <input type="submit" name="submit" id="submit" re>
                    <label for="submit" class="sendAddUser">Add User</label>
                </p>

                <p>
                    <input type="none" name="cancel" id="cancel">
                    <label for="cancel" class="cancel sendAddUser">Cancel</label>
                </p>

    </form>
        <?php
                if (isset($_POST['submit'])) 
                {

                    echo "<style>
                        .mainAddUser
                        {
                            display:flex;
                        }
                    </style>";

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
                if ($result) {
                    echo "<h5 class='regDone'>
                            <i class='done fa-solid fa-circle-check'></i>
                            Added!
                            </h5>";

                } else {
                    echo "<h4>Please try again</h4>";
                }
            }
        }
            ?>

    </div>
    </div>


    <div class="updateP">

        <h2>Update Your Password</h2>

        <form method="post">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="text" name="oldpassword" placeholder="Enter Old Password" required>
            <input type="text" name="newpassword" placeholder="Enter New Password" required>
            <button name="update">Update</button>
        </form>

        <?php


        

        if (isset($_POST['update']))
        {
            $uname = $_POST['username'];
            $pass = $_POST['oldpassword'];
            $npass = $_POST['newpassword'];
            $que = "SELECT * FROM admin WHERE username='$uname' AND password='$pass'";

            $res = mysqli_query($conn, $que);

            if (mysqli_num_rows($res) == 1) 
            {
                $uque = "UPDATE admin set password='$npass' where id=1";
                if (mysqli_query($conn, $uque)) 
                {
                    echo "<h4><i class='fa-solid fa-check'></i> Updated</h4>";
                }
                else {
                    echo "<h4><i class='fa-solid fa-xmark'></i> Error Try again</h4>";
                }
            } 
            else {
                echo "<h4><i class='far fa-times-circle'></i> Incorrect Username OR Password</h4>";
            }
        }
        ?>
    </div>
    

    <div class="userTable">
        <h2>Users Details </h2>
        <p class='addUserBtn'><i class="fas fa-plus"></i> Add User</p>

        <table>
            <tr class="headlineRow">
                <th>ID</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>MOBILE NO</th>
                <th>EMAIL</th>
                <th></th>
            </tr>
            
            <?php
                
                $conn = mysqli_connect("localhost", "root", "", "onlinecarbooking");
                $start = 0;
                $limit = 4;
                if (!isset($_GET['page'])) {
                    $_GET['page'] = 1;
                }
                else 
                {
                    $pageCount = $_GET['page'] - 1;
                    $start = $pageCount * $limit;
                }
                
                $que = "SELECT * FROM user LIMIT $start,$limit";

                $res = mysqli_query($conn, $que);

                foreach ($res as $row) 
                {
                    $id = $row['id'];
                    $password = $row['password'];
                    $number = $row['mobile_no'];
                    $email = $row['email'];
                    $username = $row['username'];
                    echo "<span class='userFetchedData'><tr class='tableRow'>
                            <td>$id</td>
                            <td>$username</td>
                            <td>$password</td>
                            <td>+91$number</td>
                            <td>$email</td>
                            <td>
                                    <form method='POST'>
                                    <button for='remove' name='remove' class='removeBtn fas fa-times-circle'> Remove </button>
                                    <input type='hidden' name='id' value=$id>
                                </form></td></tr></span>";
                }
            ?>
        </table>
    
        
    </div>

        <ul class="pagination">
        <?php
            $que = "SELECT * FROM user";
            $totalRow = mysqli_num_rows(mysqli_query($conn,$que));
            $totalPage = ceil($totalRow/$limit);

            $back = $_GET['page'];
            if ($back > 1) {
                $back--;
            }

            $next = $_GET['page'];
            if ($next < $totalPage) {
                $next++;
            }
            
            echo "<li><a href='account.php?page=$back'><i class='fa-solid fa-angles-left' title='back'></i></li>";
            
            echo "<li>$_GET[page]/$totalPage </li>";
            

            echo "<li><a href='account.php?page=$next'><i class='fa-solid fa-angles-right' title='next'></i></a></li>";

        ?>
        </ul>
    <?php
    if (isset($_POST['remove'])) {
        $que = "DELETE FROM user WHERE id='$_POST[id]'";

        $res = mysqli_query($conn, $que);

        if ($res) {
            echo "<script>window.location.href = window.location.href;</script>";
        }else {
            echo "Can not delete";
        }
    }
    ?>



    
</body>

</html>