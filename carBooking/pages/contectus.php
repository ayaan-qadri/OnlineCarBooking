<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contect Us</title>
    <link rel="stylesheet" href="../css/contectus.css">
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src="../JS/contactus.js" defer></script>
</head>

<body>


    <div class="FormBox">



        <h2>CONTACT US</h2>

        <form method="post">

            <label for="name">Enter your name</label>
            <input type="text" name="name" id="name">

            <label for="number">Enter your mobile number</label>
            <input type="number" name="number" id="number">

            <label for="email">Enter your email</label>
            <input type="email" name="email" id="email">

            <label for="msg">Send your message</label>
            <textarea id="msg" name="msg" name="msg" rows="4" cols="20"></textarea>

            <input type="submit" name="send" id="send"><br>
            <label for="send" class="loginBtn">SEND</label>

            <?php


            include("../connection.php");

            if (isset($_POST['send'])) {
                $name = $_POST['name'];
                $number = $_POST['number'];
                $email = $_POST['email'];
                $msg = $_POST['msg'];

                $details = array("name" => $name, "number" => $number, "email" => $email, "msg" => $msg);

                $json_details = json_encode($details);


                
                $que = "INSERT INTO contactus VALUES(null,'$json_details')";

                $result = mysqli_query($conn, $que);

            ?>
        </form>




    </div>

    <?php
                if ($result) {
                    echo "<h4><i class='cancel fa-regular fa-circle-xmark'></i>Successfully sent</h4>";
            
                } else {
                    echo "<h4>Please try again</h4>";
                }
            }
                
    ?>
</body>

        
</html>