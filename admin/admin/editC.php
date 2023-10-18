<!DOCTYPE html>
<html lang="en">

    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['AdminLoginUsername'])) {
        header("Location: ../login.php");
    }
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="../css/editC.css">
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src="../JS/editC.js" defer></script>
</head>

<body>
    <?php 
        include "sidebar.php";
        include "../connection.php";
    ?>

    <div class='mainAMBC'>
        <div class="addAmbc">

            <h2>Add Most Bought Car</h2>

           

            <form enctype="multipart/form-data" method="POST">

                <p>
                    <input type="file" name="img" id="img" class="textbox" required>
                </p>

                <p>
                    <label for="carName" class="text"><i class="fas fa-car"></i> ENTER CAR NAME</label>
                    <input type="text" name="carName" id="carName" class="textbox" required>
                </p>

                <p>

                    <label for="rating" class="text"><i class="far fa-smile"></i> SELECT RATING</label>

                    <select name="rating" id="rating" required>
                        <option value="★">★</option>
                        <option value="★★">★★</option>
                        <option value="★★★">★★★</option>
                        <option value="★★★★">★★★★</option>
                        <option value="★★★★★">★★★★★</option>
                    </select>
                </p>

                <p>
                    <label for="fuel" class="text"><i class="fas fa-gas-pump"></i> SELECT FULE TYPE</label>
                    <select name="fuel" id="fuel" required>
                        <option value="Petrol">Petrol</option>
                        <option value="Petrol">Diesel</option>
                        <option value="Diesel/Petrol">Diesel/Petrol</option>
                    </select>
                </p>

                 <p>
                    <label for="sitting" class="text"><i class="fa-solid fa-user"></i> Sitting</label>
                    <input type="text" name="sitting" id="sitting" class="textbox" required>
                </p>

                <div class="mainRupees">
                    <p>
                        <label for="price" class="text"><i class="fas fa-coins"></i> ENTER PRICE</label>
                        <input type="text" name="price" id="price" class="rupees textbox" required>
                    </p>

                    <p>
                        <label for="rupees" class="text rText"><i class="fas fa-rupee-sign"></i> SELECT RUPEES</label>
                        <select name="rupees" id="rupees" class="rupees" required>
                            <option value="k">K</option>
                            <option value="lakh">LAKH</option>
                            <option value="cr">Cr</option>
                        </select>
                    </p>
                </div>



                <p>
                    <input type="submit" name="submit" id="submit">
                    <label for="submit" class="sendambc">Add</label>
                </p>

               

                <p>
                    <input type="none" name="cancel" id="cancel">
                    <label for="cancel" class="cancel sendambc">Cancel</label>
                </p>
                

            </form>

            <?php
            
                   
                if (isset($_POST['submit'])) 
                {
                    echo "<style>
                            .mainAMBC
                            {
                                display:flex;
                            }
                        </style>";

                    if(isset($_FILES['img'])) {
                        $imgName = $_FILES['img']['name'];
                        $file_tmp = $_FILES['img']['tmp_name'];
                        $file_type = $_FILES['img']['type'];
                        $tragetFile = "../../carBooking/images/".$imgName;
                        
                        if (in_array($file_type, array("image/jpeg", "image/png", "image/jpg"))) 
                        {

                            if (file_exists($tragetFile)) 
                            {
                                echo "<h5><i class='fas fa-exclamation-triangle'></i> The car already exist!</h5>";
                            }
                            else {
                                    $file_path = "carBooking/images/".$imgName;
                                    $carName = $_POST['carName'];
                                    $rating = $_POST['rating'];
                                    $fuel = $_POST['fuel'];
                                    $sitting = $_POST['sitting'];
                                    $price = $_POST['price']." ".$_POST['rupees'];

                                    $que = "INSERT INTO mostboughtcars VALUES(null,'$file_path','$carName','$rating','$fuel','$sitting','$price')";

                                    $forPath = mysqli_query($conn, "SELECT img from mostboughtcars WHERE img='$file_path'");
                                    $forcarName = mysqli_query($conn, "SELECT carName from mostboughtcars WHERE carName='$carName'");


                                    if (mysqli_num_rows($forPath) >= 1) {
                                        echo "<h5><i class='fas fa-exclamation-triangle'></i> The car already exist!</h5>";
                                    } elseif (mysqli_num_rows($forcarName) >= 1) {
                                        echo "<h5><i class='fas fa-exclamation-triangle'></i> The car already exist!</h5>";
                                    } 
                                    else 
                                    {
                                        if(move_uploaded_file($file_tmp, $tragetFile))
                                        {
                                            $result = mysqli_query($conn, $que);
                                            if ($result) {
                                                echo "<h5 class='regDone'><i class='done fa-solid fa-circle-check'></i>Added!</h5>";
                                            } else {
                                                echo "<h4>Please try again</h4>";
                                            }
                                        } else {
                                            echo "<h5>can not upload</h5>";
                                        }
                                        
                                    }
                            }
                            
                        } else {
                            echo "<h5><i class='fas fa-exclamation-triangle'></i> Only JPEG,JPG OR PNG file allowed</h5>";
                        }
                    }
                }
            
            ?>
        
        </div>
    </div>
    
    <div class="ambc">

        <h2>Add card on MOST BOUGHT CARS(Home page)</h2>
        <p class='addBtn addBrand'><i class=" fa-plus"></i> ADD MOST BOUGHT CAR</p>
        
        <div class="cars">

            <?php
            
                $que = "SELECT * FROM mostboughtcars";
                $res = mysqli_query($conn,$que);
                foreach ($res as $row) 
                {
                    $id = $row['id'];
                    $img = "../../".$row['img'];
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
                    
                    <form method='POST'>
                        <button name='remove' class='removeBtn fas fa-times-circle'> Remove </button>
                        <a href='edit.php?id=$id' class='editBtn'><span class='fas fa-times-circle'> Edit </span></a>
                        <input type='hidden' name='id' value=$id>
                    </form>

                </div>";

                }
            ?>

        </div>

        <?php

            if (isset($_POST['remove'])) {
                $que = "DELETE FROM mostboughtcars WHERE id='$_POST[id]'";

                $Qpath = "SELECT img FROM mostboughtcars WHERE id='$_POST[id]'";
                
                $path = mysqli_query($conn,$Qpath);
                foreach ($path as $row) {
                    unlink($row['img']);
                }

                $res = mysqli_query($conn, $que);

                if ($res) {
                    echo "<script>window.location.href = window.location.href;</script>";
                } else {
                    echo "Can not delete";
                }
            }

        ?>    
    </div>



    <!-- add brands -->

    <div class='brandForm'>
        <div class="addAmbc">

            <h2>Add Brands</h2>

            <form enctype="multipart/form-data" method="POST">

                <p>
                    <label for="brandName" class="text"><i class="fa-solid fa-file-signature"></i> BRAND NAME</label>
                    <input type="text" name="brandName" id="brandName" class="textbox" required>
                </p>

                <p>
                    
                    
                    <label for="imgBrand" class="text"><i class="fa-solid fa-image"></i> SELECT BRAND'S IMAGE</label>
                    <input type="file" name="imgBrand" id="imgBrand" class="textbox" required>
                </p>

               <p>
                    <input type="submit" name="submitBrand" id="submitBrand">
                    <label for="submitBrand" class="sendambc">Add</label>
                </p>

                <p>
                    <input type="none" name="cancel" id="cancel">
                    <label for="cancel" class="cancel sendambc">Cancel</label>
                </p>
                

            </form>

            <?php

            

            if (isset($_POST['submitBrand'])) {
                echo "<style>
                            .brandForm
                            {
                                display:flex;
                            }
                        </style>";


                
                    if (isset($_FILES['imgBrand'])) {
                        $imgName = $_FILES['imgBrand']['name'];
                        $file_tmp = $_FILES['imgBrand']['tmp_name'];
                        $file_type = $_FILES['imgBrand']['type'];
                        $tragetFileB = "../../carBooking/images/logos/".$imgName;

                        if (in_array($file_type, array("image/jpeg", "image/png", "image/jpg"))) {

                            if (file_exists($tragetFileB)) {
                                echo "<h5><i class='fas fa-exclamation-triangle'></i> Brand logo alredy exist!</h5>";
                            } else {
                                $imgPath = "carBooking/images/logos/" . $imgName;
                                $brandName = $_POST['brandName'];

                                $queB = "INSERT INTO companies VALUES(null,'$brandName','$imgPath')";


                                $forPathB = mysqli_query($conn, "SELECT img FROM companies WHERE img='$imgPath'");

                                $forBrnadName = mysqli_query($conn, "SELECT brandName FROM companies WHERE brandName='$brandName'");

                                if (mysqli_num_rows($forPathB) >= 1) {
                                    echo "<h5><i class='fas fa-exclamation-triangle'></i> The car already exist!</h5>";
                                } elseif (mysqli_num_rows($forBrnadName) >= 1) {
                                    echo "<h5><i class='fas fa-exclamation-triangle'></i> The car already exist!</h5>";
                                } else {
                                    if (move_uploaded_file($file_tmp, $tragetFileB)) 
                                    {
                                        $result = mysqli_query($conn, $queB);
                                        $queTable = "CREATE TABLE $brandName (
                                            id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                                            img varchar(255),
                                            carName varchar(50),
                                            price varchar(50),
                                            fuel varchar(50),
                                            gearType varchar(50),
                                            sitting varchar(10),
                                            engine varchar(100),
                                            mileage varchar(50),
                                            bph varchar(100),
                                            driveType varchar(100),
                                            rating varchar(255)
                                        )";
                                        $resultT = mysqli_query($conn,$queTable);
                                        
                                        if ($result && $resultT) 
                                        {
                                            echo "<h5 class='regDone'><i class='done fa-solid fa-circle-check'></i>Added!</h5>";
                                        } else {
                                            echo "<h4>Please try again</h4>";
                                        }
                                    } else {
                                        echo "<h5>can not upload</h5>";
                                    }

                                }
                            }

                        } else {
                            echo "<h5><i class='fas fa-exclamation-triangle'></i> Only JPEG,JPG OR PNG file allowed</h5>";
                        }
                    }
                
            }
            ?>
        </div>
    </div>

    <div class="ambc">

        <h2>Add brand (cars.php)</h2>
        <p class='addCard addBtn'><i class=" fa-plus"></i> ADD BRAND</p>
        
        <div class="brands">

            <ul>

                <?php
                include("../connection.php");
                $que = "SELECT * from companies";
                $res = mysqli_query($conn, $que);

                foreach ($res as $row) {
                    $name = $row['brandName'];
                    $img = "../../".$row['img'];
                    $id = $row['id'];
                    echo "<li class='liBrand'>
                                <div class='brandCard'>
                                    <div class='reBtn'>
                                        <form method='POST'>
                                            <button name='removeBrand' class='removeBB fas fa-times-circle'> Remove </button>
                                            <a href='editBrand.php?brand=$name' ><span class='addBB fas fa-times-circle'> Add into Brand </span></a>
                                            <input type='hidden' name='idB' value=$id>
                                        </form>
                                    </div>
                                    <div>
                                        <a href='../../carBooking/brands/carDetails.php?brand=$name'>
                                            <img src='$img'>
                                            <h2>$name</h2>
                                        </a>
                                    </div>
                                </div>
                            </li>";
                }

                ?>
                
            </ul>
        </div>
    </div>

    <?php

            if (isset($_POST['removeBrand'])) 
            {
                $que = "DELETE FROM companies WHERE id='$_POST[idB]'";
                echo "$_POST[idB]";
                $Qpath = "SELECT * FROM companies WHERE id='$_POST[idB]'";
                $brandNameR = "";
                $path = mysqli_query($conn,$Qpath);
                foreach ($path as $row) {
                    $brandNameR = $row['brandName'];
                    unlink("../../".$row['img']);
                    
                    echo $brandNameR;
                }

                $res = mysqli_query($conn, $que);
                $queryT = "DROP TABLE $brandNameR";
                echo "$brandNameR";
                $resT = mysqli_query($conn,$queryT);

                if ($res && $resT) {
                    echo "<script>window.location.href = window.location.href;</script>";
                } else {
                    echo "Can not delete";
                }
            }

    

        ?>
</body>

</html>