<?php

include 'connect.php';

$connection = connectNew();

$nome = filter_input(INPUT_POST, "nome"); 
$nickname = filter_input(INPUT_POST, "nickname");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, "telefone");
$senha = filter_input(INPUT_POST, "senha");


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["enviar"])) {

    $queryVerificarUser = "SELECT id_usuario FROM usuarios WHERE email_usuario = '$email'";

    $resultVerificar = mysqli_query($connection, $queryVerificarUser);


}


?>

