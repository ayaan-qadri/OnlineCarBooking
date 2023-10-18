<!DOCTYPE html>
<html lang="en">

<?php

    if(!isset($_SESSION)) 
    {
        session_start();
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Booking</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="JS/main.js" defer></script>
    <link rel="stylesheet" href="fonts/css/all.css">

</head>

<body>

    <div class="menu-btns">
        <ul>
            <li><a href="main.php">HOME</a></li>
            <li><a href="#foo">ABOUT US</a></li>
            <li><a href="pages/cars.php">FIND CARS</a></li>
            <li><a href="pages/contectus.php">CONTACT US</a></li>
        </ul>
    </div>

    <header>


        <div class="right">

            <a href="pages/login.php" id="login"><i class="fa-solid fa-user-large"></i></a>
            
            <a href="pages/logout.php" id="logout">LOGOUT</a>
            <h1 id="logout">Hello, <?php if (isset($_SESSION['userLoggedIn'])) {
                echo $_SESSION['userLoggedIn'];}?>
            </h1>

            <?php
                if (!isset($_SESSION['userLoggedIn']))
                {
                    echo "<style>
                        #logout
                        {
                            display:none;
                        }
                    </style>";
                }
                else {
                    echo "<style>
                        #login
                        {
                            display:none;
                        }
                    </style>";
                }
            ?>

            <button class="menu" type="button">
                <div class="threeLine">
                    <div id="L1"></div>
                    <div id="L2"></div>
                    <div id="L3"></div>
                </div>
                <span>MENU</span>
            </button>

        </div>

    </header>



    <main>

        <div class="main_image">
            <img src="images/lambo.jpg" alt="car photo">
            <h2>
                FIND A BEST CAR <br> FOR YOU
                <a href="pages/cars.php" class="fas fa-arrow-circle-right"></a>
            </h2>
        </div>


        <div class="mbc">
            <h1>MOST BOUGHT CARS</h1>
        </div>

        <div class="cars">

            <?php

            include("connection.php");
            $que = "SELECT * FROM mostboughtcars";
            $res = mysqli_query($conn, $que);
            foreach ($res as $row) {
                $img = "../".$row['img'];
                $carName = $row['carName'];
                $rating = $row['rating'];
                $fuel = $row['fuel'];
                $sitting = $row['sitting'];
                $price = $row['price'];


                echo " <div class='car'>
                <div class='car_image'>
                    <img src=$img alt=$carName>
                </div>

                <div class='car_details'>

                    <h2 class='car_name'>$carName</h2>

                    <ul>
                        <li>
                            <p>Rating:<span>$rating</span></p>

                        </li>

                        <li>
                            <span> <i class='fas fa-gas-pump'></i> $fuel</span>
                        </li>

                        <li>
                            <span> <i class='fa-solid fa-user'></i> $sitting Seater</span>
                        </li>
                    </ul>


                    <a href='#'>Book Now</a>

                    <h2 class='car_price'>₹$price</h2>

                </div>
            </div>";

            }
            ?>
        </div>


    </main>

    <footer id="foo">
        <div class="socials">
            <ul>
                <li>
                    <a>
                        <i class="fab fa-facebook-f"></i>
                        facebook
                    </a>
                </li>
                <li>
                    <a>
                        <i class="fab fa-twitter"></i>
                        twitter
                    </a>
                </li>
                <li>
                    <a>
                        <i class="fab fa-instagram"></i>
                        instagram
                    </a>
                </li>
                <li>
                    <a>
                        <i class="fab fa-youtube"></i>
                        youtube
                    </a>
                </li>
            </ul>
        </div>

        <div class="footer_menu-btns">
            <ul>
                <li><a href="main.php">GO TO TOP</a></li>
                <li><a href="pages/cars.php">FIND CARS</a></li>
                <li><a href="pages/contectus.php">CONTACT US</a></li>
            </ul>
        </div>
        <p class="copyrights">Copyright 2023 @ Ayaan</p>
    </footer>

</body>

</html>