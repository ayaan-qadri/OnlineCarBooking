<!DOCTYPE html>
<html lang="en">

    <?php
    if (!isset($_SESSION)) 
    {
        session_start();
    }
    if (!isset($_SESSION['AdminLoginUsername'])) {
        header("Location: ../login.php");
    }
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../fonts/css/all.css">

</head>
<body>
    
    
    <div class='sidebar'>
        <nav>
            <ul>

                <li>
                    <a href="admin.php" title="ADMIN'S HOME PAGE">
                        <i class="fad fa-flower-tulip"></i>
                    </a>                    
                </li>

                <li>
                    <a href="account.php" title="ACCOUNTS">
                        <i class="far fa-user"></i>
                    </a>                    
                </li>

                <li>
                    <a href="editC.php" title="CATEGORY EDITING">
                        <i class="fa-solid fa-wrench"></i>
                    </a>      
                                 
                </li>

                <li>
                    <a href="booking.php" title="BOOKINGS">
                        <i class="far fa-file"></i>
                    </a>                    
                </li>

                <li>
                    <a href="messages.php" title="MESSAGES FROM USERS">
                        <i class="fa-solid fa-envelope"></i>
                    </a>                    
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>