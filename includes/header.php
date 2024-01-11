<?php 
$paginaAtual = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
$tituloPagina = str_replace('_', ' ', $paginaAtual);
$tituloPagina = ucwords($tituloPagina);

// Caminho dinâmico para o arquivo CSS
$caminhoCSS = "../assets/css/$paginaAtual.css";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Licorice&family=Niconne&family=Roboto+Slab&family=Sevillana&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Icone -->
    <link rel="shortcut icon" href="../assets/img/icone maria doces.png" type="image/png">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= $caminhoCSS; ?>">

    <title><?php echo $tituloPagina; ?></title>

</head>

  <body>
  
    <header>
        <nav class="nav-bar">
            <li><a href="../pages/index.php">Página Inicial</a></li>
            <li><a href="../pages/products.php"  >Produtos</a></li>
            <li><img class="logo" src="../assets/img/teste2.png" alt="logo da loja maria doces"></li>
            <li><a href="../pages/contacts.php"  >Contato</a></li>
            <li><a href="../pages/about.php"  >Nossa História</a></li>
        </nav>
    </header>

    <main>
  <div class="sub-barra">
    <img class="icon-login" src="../assets/img/icone user2.png" alt="icone de login">
    <a class="login" href="login.php">Login</a>
    <a class="cadastro" href="register.php">Cadastro</a>
    <img class="icon-sign" src="../assets/img/icon sign2.png" alt="icone de cadastro">
  </div>
