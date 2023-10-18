<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booking</title>
    <link rel="stylesheet" href="../css/booking.css">
</head>

<?php

    if (!isset($_SESSION)) {
        session_start();
    }
    include("../connection.php");

?>
<body>

    <h1>Your Bookings</h1>
    
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



    <div class="list">


        <ul>
            <?php
            $user = $_SESSION['userLoggedIn'];

            $queB = "SELECT car,brandName FROM booking WHERE user='$user'";
            
            $resB = mysqli_query($conn,$queB);


            foreach($resB as $rowB) 
            {
                $brandName = $rowB['brandName'];
                $que = "SELECT * FROM $brandName WHERE carName='$rowB[car]'";
                $res = mysqli_query($conn, $que);



                foreach ($res as $row) {
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
            </li>
            ";
                }
            }

            // <a href='carDetails.php?brand=$brandName&car=$row[carName]' id='book'>BOOK NOW</a>
            
            ?>
        </ul>
    </div>
</body>
</html>