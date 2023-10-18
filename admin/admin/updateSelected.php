<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['AdminLoginUsername'])) 
    {
        include("../connection.php");
        $status = $_POST['status'];
        $id = $_POST['id'];
        $queU = "UPDATE booking SET status='$status' WHERE id='$id'";
        mysqli_query($conn, $queU);
        header("Location: booking.php");
    }
    else 
    {
        header("Location: ../login.php");
    }
    
?>