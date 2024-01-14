<?php 
session_start();

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'funcionario') {
    header("Location: login.php");
    exit();
}

?>