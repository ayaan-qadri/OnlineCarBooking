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
    <title>Add Brand</title>
    <link rel="stylesheet" href="../css/editBrand.css">
    <script src="../js/editBrand.js" defer></script>
</head>

<body>

    <?php 
        include("sidebar.php");
        include("../connection.php");
    ?>

    <div class='mainAMBC'>
        <div class="addAmbc">

            <h2>Add Car in
                <?php echo $_GET['brand']; ?>
            </h2>

            <form enctype="multipart/form-data" method="POST">

                <p>
                    <input type="file" name="img" id="img" class="textbox" required>
                </p>

                <p>
                    <label for="carName" class="text"><i class="fas fa-car"></i> ENTER CAR NAME</label>
                    <input type="text" name="carName" id="carName" class="textbox" required>
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
                    <label for="fuel" class="text"><i class="fas fa-gas-pump"></i> SELECT FULE TYPE</label>
                    <select name="fuel" id="fuel" required>
                        <option value="Petrol">Petrol</option>
                        <option value="Petrol">Diesel</option>
                        <option value="Diesel/Petrol">Diesel/Petrol</option>
                    </select>
                </p>

                <p>
                    <label for="gearType" class="text"><i class="fa-solid fa-gears"></i> SELECT GEAR TYPE</label>
                    <select name="gearType" id="gearType" required>
                        <option value="manual">Manual</option>
                        <option value="automatic">Automatic</option>
                        <option value="Manual/Automatic">Manual/Automatic</option>
                    </select>
                </p>



                <p>
                    <label for="sitting" class="text"><i class="fa-solid fa-user"></i> Sitting</label>
                    <input type="text" name="sitting" id="sitting" class="textbox" required>
                </p>

                <p>
                    <label for="engine" class="text"><i class="fa-solid fa-engine"></i> Engine('cc' will be
                        added)</label>
                    <input type="text" name="engine" id="engine" class="textbox" required>
                </p>

                <p>
                    <label for="mileage" class="text"><i class="fa-solid fa-gauge"></i> Mileage(in kmpl)</label>
                    <input type="text" name="mileage" id="mileage" class="textbox" required>
                </p>

                <p>
                    <label for="bph" class="text"><i class="fa-solid fa-bolt-lightning"></i> Brake
                        Horsepower(bph)</label>
                    <input type="text" name="bph" id="bph" class="textbox" required>
                </p>

                <p>
                    <label for="driveType" class="text"><i class="fa-solid fa-car-side-bolt"></i> Drive Type: </label>
                    <input type="text" name="driveType" id="driveType" class="textbox" required>
                </p>

                <p>

                    <label for="rating" class="text"><i class="fa-solid fa-heart"></i> SELECT RATING</label>

                    <select name="rating" id="rating" required>
                        <option value="★">★</option>
                        <option value="★★">★★</option>
                        <option value="★★★">★★★</option>
                        <option value="★★★★">★★★★</option>
                        <option value="★★★★★">★★★★★</option>
                    </select>
                </p>

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
            $brand = $_GET['brand'];

            if (isset($_POST['submit'])) {
                echo "<style>
                            .mainAMBC
                            {
                                display:flex;
                            }
                        </style>";

                if (isset($_FILES['img'])) {
                    $imgName = $_FILES['img']['name'];
                    $file_tmp = $_FILES['img']['tmp_name'];
                    $file_type = $_FILES['img']['type'];
                    $tragetFile = "../../carBooking/brands/images/" . $imgName;

                    if (in_array($file_type, array("image/jpeg", "image/png", "image/jpg"))) {

                        if (file_exists($tragetFile)) {
                            echo "<h5><i class='fas fa-exclamation-triangle'></i> The car already exist!</h5>";
                        } else {
                            $file_path = "carBooking/brands/images/" . $imgName;
                            $carName = $_POST['carName'];
                            $price = $_POST['price'] . "" .ucfirst($_POST['rupees']);
                            $fuel = $_POST['fuel'];
                            $gearType = $_POST['gearType'];
                            $sitting = $_POST['sitting'];
                            $engine = $_POST['engine'];
                            $mileage = $_POST['mileage'];
                            $bph = $_POST['bph'];
                            $driveType = $_POST['driveType'];
                            $rating = $_POST['rating'];

                            $que = "INSERT INTO $brand VALUES(
                                null,'$file_path','$carName','$price',
                                '$fuel','$gearType','$sitting','$engine','$mileage',
                                '$bph','$driveType','$rating')";

                            $forPath = mysqli_query($conn, "SELECT img from $brand WHERE img='$file_path'");
                            $forcarName = mysqli_query($conn, "SELECT carName from $brand WHERE carName='$carName'");


                            if (mysqli_num_rows($forPath) >= 1) {
                                echo "<h5><i class='fas fa-exclamation-triangle'></i> The car already exist!</h5>";
                            } elseif (mysqli_num_rows($forcarName) >= 1) {
                                echo "<h5><i class='fas fa-exclamation-triangle'></i> The car already exist!</h5>";
                            } else {
                                if (move_uploaded_file($file_tmp, $tragetFile)) {
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

        <h2>Add card on Brand(Company_name.php)</h2>
        <p class='addBtn addBrand'><i class=" fa-plus"></i> ADD CARD IN
            <?php echo $_GET['brand']; ?>
        </p>
        
        <div class="list">


        <ul>
            <?php

                $brandName = $_GET['brand'];
                $que = "SELECT * FROM $brandName";
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



                ?>
            </ul>
        </div>
    </div>
</body>

</html>