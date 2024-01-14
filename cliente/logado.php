<?php 
session_start();

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'cliente') {
    header("Location: login.php");
    exit();
}

?>