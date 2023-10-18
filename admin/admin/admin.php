<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if(!isset($_SESSION['AdminLoginUsername']))
    {
        header('Location: ../login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php 
        include 'sidebar.php';
        include("../connection.php");
    ?>

    <h1 class="username">
        <?php echo $_SESSION['AdminLoginUsername']; ?>, Welcome To AdminPanel
    </h1>


<form method="post">
    <button name="logout" class="logoutBtn">logout</button>
</form>
<?php 
    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: ../login.php');
    }
?>
</body> 
</html>