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
    <title>Edit</title>
    <link rel="stylesheet" href="../css/edit.css">
    <script src="../JS/edit.js" defer></script>
</head>
<body>

    <?php
        include "sidebar.php";
        include("../connection.php");
    ?>

    <div class="cars">

            <?php

            $id = $_GET['id'];


        $que = "SELECT * FROM mostboughtcars WHERE id='$id'";
        $res = mysqli_query($conn, $que);
        foreach ($res as $row) {
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

            </div>";

        }
        ?>
    
    </div>
    <div class='EmainAMBC'>
        <div class="EaddAmbc">

            <h2>Edit <?php echo $carName ?></h2>
            <?php
            $carName = "";
            $sitting = "";
            $price = "";
            $img = "";
            $rating = "";
            $Selque = "SELECT * FROM mostboughtcars where id='$id'";
            $fuel = "";
            $res = mysqli_query($conn, $Selque);
            $prePrice = "";
            foreach ($res as $row) {
                $carName = $row['carName'];
                $sitting = $row['sitting'];
                $price = str_replace(array(" cr", " lakh", " k"), "", $row['price']);
                $prePrice = $row['price'];
                $rating = $row['rating'];
                $fuel = $row['fuel'];
            }
            $prePrice = str_replace(array(".", "-", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", " "), "", $prePrice);
            ?>
    
    
            <form enctype="multipart/form-data" method="POST">
    
                <p>
                    <input type="file" name="Eimg" id="Eimg" class="textbox">
                </p>
    
                <p>
                    <label for="EcarName" class="text"><i class="fas fa-car"></i> ENTER CAR NAME</label>
                    <input type="text" name="EcarName" id="EcarName" class="textbox" value="<?php echo $carName; ?>"
                        required>
                </p>
    
                <p>
    
                    <label for="Erating" class="text"><i class="far fa-smile"></i> SELECT RATING</label>
    
                    <select name="Erating" id="Erating" required>
                        <option value="★">★</option>
                        <option value="★★">★★</option>
                        <option value="★★★">★★★</option>
                        <option value="★★★★">★★★★</option>
                        <option value="★★★★★">★★★★★</option>
                    </select>
                </p>
    
                <p>
                    <label for="Efuel" class="text"><i class="fas fa-gas-pump"></i> SELECT FUEL TYPE</label>
                    <select name="Efuel" id="Efuel" required>
                        <option value="Petrol">Petrol</option>
                        <option value="Petrol">Diesel</option>
                        <option value="Diesel/Petrol">Diesel/Petrol</option>
                    </select>
                    
                </p>
    
                <p>
                    <label for="Esitting" class="text"><i class="fa-solid fa-user"></i> Sitting</label>
                    <input type="text" name="Esitting" id="Esitting" class="textbox" value="<?php echo $sitting; ?>"
                        required>
                </p>
    
                <div class="mainRupees">
                    <p>
                        <label for="Eprice" class="text"><i class="fas fa-coins"></i> ENTER PRICE</label>
                        <input type="text" name="Eprice" id="Eprice" class="rupees textbox" value="<?php echo $price; ?>"
                            required>
                    </p>
    
                    <p>
                        <label for="Erupees" class="text rText"><i class="fas fa-rupee-sign"></i> SELECT RUPEES</label>
                        <select name="Erupees" id="Erupees" class="rupees" required>
                            <option value="k">K</option>
                            <option value="lakh">LAKH</option>
                            <option value="cr">Cr</option>
                        </select>
                    </p>
                </div>
    
    
    
                <p>
                    <input type="submit" name="update" id="update">
                    <label for="update" class="sendambc">Update</label>
                </p>
    
    
    
                <p>
                    <input type="none" name="Ecancel" id="Ecancel">
                    <label for="Ecancel" class="Ecancel sendambc">Cancel</label>
                </p>
    

                <?php
                echo "<script>
            const rating = document.getElementById('Erating');
            for (let i = 0; i < rating.options.length; i++) {
            if (rating.options[i].value == '$rating') {
                rating.options[i].selected = true;
            }}

            const fuel = document.getElementById('Efuel');
            for (let i = 0; i < fuel.options.length; i++) {
            if (fuel.options[i].value == '$fuel') {
                fuel.options[i].selected = true;
            }}

            const prePrice = document.getElementById('Erupees');
            for (let i = 0; i < prePrice.options.length; i++) {
            if (prePrice.options[i].value == '$prePrice') {
                prePrice.options[i].selected = true;
            }}
            
            </script>";
                ?>

            </form>
    
    
    
            <?php


            $Qpath = "SELECT img FROM mostboughtcars WHERE id='$id'";
            $path = mysqli_query($conn, $Qpath);
            $file_path;

            foreach ($path as $row) {
                $file_path = $row['img'];
            }
            $check = 1;
            $error;
            if (isset($_POST['update'])) 
            {
                
                
                $carName = $_POST['EcarName'];
                $rating = $_POST['Erating'];
                $fuel = $_POST['Efuel'];
                $sitting = $_POST['Esitting'];
                $price = $_POST['Eprice'] . " " . $_POST['Erupees'];

                if (isset($_FILES['Eimg'])) {
                    $imgName = $_FILES['Eimg']['name'];
                    $file_tmp = $_FILES['Eimg']['tmp_name'];
                    $file_type = $_FILES['Eimg']['type'];

                    $file_size = $_FILES['Eimg']['size'];

                    if ($file_size > 0) 
                    {
                        
                        $Ufile_path = "../../carBooking/images/".$imgName;
                        if (!file_exists($Ufile_path)) 
                        {
                            unlink("../../" . $file_path);
                            if (in_array($file_type, array("image/jpeg", "image/png", "image/jpg"))) {
                                if (move_uploaded_file($file_tmp, $Ufile_path)) {
                                    $file_path = "carBooking/images/".$imgName;
                                } else {
                                    $error = "<h5>can not upload</h5>";
                                    $check = 0;
                                }
                            } else {
                                $error = "<h5><i class='fas fa-exclamation-triangle'></i> Only JPEG,JPG OR PNG file allowed</h5>";
                                $check = 0;
                            }
                        }
                        else {
                            $error = "<h5><i class='fas fa-exclamation-triangle'></i> The car already exist!</h5>";
                            $check = 0;
                        }
                    }

                }
                
                if ($check) {

                    $Uque = "UPDATE mostboughtcars SET img='$file_path', carName='$carName', rating='$rating', fuel='$fuel', sitting='$sitting', price='$price' WHERE id='$id'";

                    $result = mysqli_query($conn, $Uque);

                    if ($result) {
                        echo "<h5 class='regDone'>
                                    <i class='done fa-solid fa-circle-check'></i>Updated!</h5>";
                        echo "<script>
                            window.location.href = window.location.href;
                        </script>";
                    } else {
                        echo "<h4>Please try again</h4>";
                    }
                } else {
                    echo $error;
                }
            }
            
            ?>
        </div>
    </div>
</body>
</html>