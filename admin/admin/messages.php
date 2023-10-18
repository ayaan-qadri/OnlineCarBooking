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
    <title>Messages</title>
    <link rel="stylesheet" href="../css/messages.css">
    <script src="../../test.js" defer></script>
</head>
<body>
    
    <?php include "sidebar.php"; ?>

    <div class="messages">
        <?php

        include("../connection.php");

        $que = "SELECT * FROM contactus";

        $res = mysqli_query($conn, $que);

        $id;
        $name;
        $number;
        $email;
        $msg;

        foreach ($res as $row) 
        {
            // var_dump($row);
            $id = $row['id'];

            $json_details = json_decode($row['details'], true);

            $name = $json_details['name'];
            $number = $json_details['number'];
            $email = $json_details['email'];
            $msg = $json_details['msg'];

            echo "
            <div class='card-container'>
                <div class='card'>
                
                    <div class='atDisplay'>
                        <h2>Messgae id.$id</h2>
                        <h3>By $name</h3>
                        <h3>$email</h3>
                    </div>

                    <div class='msg'>
                        <h1>By $name</h1>
                        <span>$msg</span>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>
</body>
</html>