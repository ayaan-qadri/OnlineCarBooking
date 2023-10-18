<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahindra</title>
    <link rel="stylesheet" href="carDetails.css">
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src ="carDetails.js" defer></script>
</head>

<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<body>

    <?php
        include("../connection.php"); 
    ?>
    
    <div class="loginAlert">
        <div class="message">
            <p>You must be logged in for that</p>
        </div>
        
        <div class='action'>
            <form method="POST">
                <button name="loginRedirect" class="loginRedirectBtn">LOGIN</button>
                <button name="cancel" class="okBtn">OK</button>
            </form>
        </div>
    </div>

    <div class="loginArea">
        <form method="POST">
            <button name="cartBtn" class='cart'><i class="fas fa-truck"></i></button>
        </form>

        <?php
        if (isset($_SESSION['userLoggedIn'])) {
            echo "<a class='loginBtn'><span>Happy booking, $_SESSION[userLoggedIn]</span><i class='fa-solid fa-user-large'></i></a>";
            echo "<style>
                        .active
                        {
                            display: none;
                        }
                </style>";
        } 

        if (isset($_POST['cartBtn'])) 
        {
            

            if (isset($_SESSION['userLoggedIn'])) 
            {
                header("Location: ../pages/booking.php");
            } 
            else {

                echo "<style>
                        .loginAlert
                        {
                            display:block;
                        }
                    </style>";
            }
        } 
        
        ?>
        <a href="../pages/login.php?brand=<?php echo $_GET['brand']; ?>" class='loginBtn active'><span>Click here to login</span><i class="fa-solid fa-user-large"></i></a>

    </div>

    <div class="menu-btns">
        <ul>
            <li id='home'><a href="../main.php">HOME</a>
                <div class='line'></div>
            </li>
            <li id='aboutus'><a href="#">BOOKINGS</a>
                <div class='line'></div>
            </li>
            <li id='findcars'><a href="../pages/cars.php">FIND CARS</a>
                <div class='line'></div>
            </li>
            <li id='contactus'><a href="../pages/contectus.php">CONTACT US</a>
                <div class='line'></div>
            </li>
        </ul>
    </div>
    
    <?php 
        if (isset($_GET['car'])) 
        {
            if (isset($_SESSION['userLoggedIn'])) 
            {
                echo "<style>

                .brandForm
                {
                    display:flex;
                }
                body
                {
                    overflow:hidden;
                }

                </style>";
            } 
            else {
                echo "<style>
                    .loginAlert
                    {
                        display:block;
                    }
                </style>";
            }
            
        }

        if (isset($_POST['loginRedirect'])) 
        {
            header("Location: ../pages/login.php?brand=$_GET[brand]");
        }
        
    ?>
    <div class='brandForm'>
        <div class='addAmbc'>
            
            <h2>Booking For <?php echo strtoupper($_GET['car']); ?></h2>

            <form enctype='multipart/form-data' method='POST'>

                <p>
                    <label for='name' class='text'><i class="fa-solid fa-user"></i> Enter Full Name:</label>
                    <input type='text' name='name' id='name' class='textbox' required>
                </p>

                <p>
                    <label for='number' class='text'><i class='fa-solid fa-phone'></i> Enter Mobile Number:</label>
                    <input type='text' name='number' id='number' class='textbox' required>
                </p>

                <p>
                    <label for='email' class='text'><i class="fa-solid fa-envelope"></i> Enter Email:</label>
                    <input type='email' name='email' id='email' class='textbox' required>
                </p>

                <p>
                    <label for='address' class='text'><i class='fa-solid fa-house'></i> Enter Address:</label>
                    <input type='text' name='address' id='address' class='textbox' required>
                </p>

               <p>
                    <input type='none' name='carName' value="<?php $_GLOBALS['car'] ?>">
                    <input type='submit' name='submit' id='submit'>
                    <label for='submit' class='sendambc'>Book</label>
                </p>
            </form>
            <form method='POST'>
                    <p>
                        <input type='submit' name='cancel' id='cancel'>
                        <label for='cancel' class='cancel sendambc'>Cancel</label>
                    </p>
            </form> 

            <?php
           if (isset($_POST['submit'])) 
           {

                echo "<style>
                        .brandForm
                        {
                            display:flex;
                        }
                    </style>";
                    
                $carName = $_GET['car'];
                $name = $_POST['name'];
                $number = $_POST['number'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $brandName = $_GET['brand'];
                $que = "INSERT INTO booking VALUES(null,'$_SESSION[userLoggedIn]','$name','$number','$email','$address','$carName','$brandName','pending')";

                $forUserCar = mysqli_query($conn, "SELECT number from booking WHERE user='$_SESSION[userLoggedIn]' AND car='$carName'");



                if (mysqli_num_rows($forUserCar) >= 1) 
                {
                    echo "<h5> Already Booked </h5>";
                } else {
                    $result = mysqli_query($conn, $que);
                    if ($result) {
                        echo "<h5 class='regDone'>
                            <i class='fa-solid fa-message-middle'></i>
                            We will contact you personally !
                            </h5>";

                    } else {
                        echo "<h4>Please try again</h4>";
                    }
                }
            }


            if (isset($_POST['cancel'])) {
                $brandName = $_GET['brand'];
                
                echo "<script>
                    window.location.href = 'carDetails.php?brand=$brandName';
                </script>";

                echo "<style>
                        .loginAlert
                        {
                            display:none;
                        }
                    </style>";
            }


            
            ?>

        </div>
    </div>

    <div class="list">


        <ul>
            <?php

            $brandName = $_GET['brand'];
            $que = "SELECT * FROM $brandName";
            $res = mysqli_query($conn, $que);

            

            foreach($res as $row) 
            {
                echo "<li>
                    <img src='../../$row[img]'>
                    <h2>$row[carName]</h2>
                    <table class='details'>
                    <tr>
                        <td>
                            <i class='fa-solid fa-indian-rupee-sign'></i><b> Price:</b> $row[price]
                        </td>

                        <td>
                            <i class='fas fa-gas-pump'></i> <b>Gas:</b> $row[fuel]
                        </td>

                        <td>
                            <i class='fa-solid fa-gears'></i> <b>Gear:</b> $row[gearType]
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class='fa-solid fa-user'></i> <b>Seating:</b> $row[sitting]
                        </td>

                        <td>
                            <i class='fa-solid fa-engine'></i> <b>Engine:</b> $row[engine]cc
                        </td>

                        <td>
                            <i class='fa-solid fa-gauge'></i> <b>Mileage:</b>  $row[mileage] kmpl
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <i class='fa-solid fa-bolt-lightning'></i> <b>BPH:</b> $row[bph]
                        </td>

                        <td>
                            <i class='fa-solid fa-car-side-bolt'></i> <b>Drive Type:</b> $row[driveType]
                        </td>
                        <td>
                            <i class='fa-solid fa-heart'></i> <b>Rating:</b> $row[rating]
                        </td>
                    </tr>
                </table>

                
                 <a href='carDetails.php?brand=$brandName&car=$row[carName]'>
                    <button type='submit' name='booking' id='booking' value='$row[carName]'>Book now</button>
                </a>
            </li>
            ";
            }

            // <a href='carDetails.php?brand=$brandName&car=$row[carName]' id='book'>BOOK NOW</a>
            
            ?>
        </ul>
    </div>
</body>

</html>