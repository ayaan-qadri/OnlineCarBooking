<?php
    if(!isset($_SESSION)) 
    {
        session_start();
    }
    unset($_SESSION['userLoggedIn']);
    session_destroy();
    header("Location: ../main.php");
?>