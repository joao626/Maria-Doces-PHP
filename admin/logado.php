<?php 
session_start();

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'admin') {
    header("Location: login.php");
    exit();
}


    

?>
