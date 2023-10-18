<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARS</title>
    <link rel="stylesheet" href="../css/cars.css">
    <link rel="stylesheet" href="../fonts/css/all.css">
    <!-- <script src="../JS/test.js" defer></script> -->

</head>

<body>

    <header>
        <div class="menu-btns">
            <ul>
                <li><a href="../main.php">HOME</a></li>
                <li><a href="#foo">ABOUT US</a></li>
                <li><a href="cars.php">FIND CARS</a></li>
                <li><a href="contectus.php" class="cUs">CONTACT US</a></li>
            </ul>
        </div>
    </header>


    <main>
        
        <h1 class="title">Brands</h1>

        <div class="brands">

            <ul>

                <?php
                include("../connection.php");
                $que = "SELECT * from companies";
                $res = mysqli_query($conn, $que);

                foreach ($res as $row) {
                    $name = $row['brandName'];
                    $img = "../../".$row['img'];
                    echo "<li>
                    <a href='../brands/carDetails.php?brand=$name'>
                        <img src='$img'>
                        <h2>$name</h2>
                    </a>
                </li>";

                }

                ?>
                
            </ul>
        </div>


        
    </main>

    <footer id="foo">
        <div class="socials">
            <ul>
                <li>
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                        facebook
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                        twitter
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                        instagram
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fab fa-youtube"></i>
                        youtube
                    </a>
                </li>
            </ul>
        </div>

        <div class="footer_menu-btns">
            <ul>
                <li><a href="../main.php">HOME</a></li>
                <li><a href="cars.php">GO TO TOP</a></li>
                <li><a href="cars.php">FIND CARS</a></li>
                <li><a href="contectus.php">CONTACT US</a></li>
            </ul>
        </div>

        <p class="copyrights">Copyright 2023 @ Ayaan </p>

    </footer>
</body>

</html>