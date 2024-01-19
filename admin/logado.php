<?php 
session_start();

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'admin') {
    header("Location: login.php");
    exit();
}

// faz um dashboard aqui sei lá

include './includes/header.php';

?>



