<?php 
session_start();

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'cliente') {
    header("Location: login.php");
    exit();
}

include './includes/header.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ÁREA DO ADMINISTRADOR</title>

</head>

  <body>
  
    <header>
        <nav class="nav-bar">
            <li><a href="./pages/perfil.php">Perfil</a></li>
            <li><a href="./pages/pedidos.php">Seus pedidos</a></li>
            <li><a href="./pages/produtos.php">Nossos Produtos</a></li>
            <li><a href="./pages/contato.php">Contato</a></li>
            <li><a href="#">Carrinho</a></li>
        </nav>
    </header>

    <main>
