<?php
include 'connect.php';

$connection = connectNew();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["entrar"])) {
    $user = filter_input(INPUT_POST, "user");
    $password = filter_input(INPUT_POST, "password");

    $queryUsuario = "SELECT * FROM usuarios WHERE email_usuario = '$user'";
    $resultUsuario = mysqli_query($connection, $queryUsuario);

    $queryCliente = "SELECT * FROM clientes WHERE nickname_cliente = '$user'";
    $resultCliente = mysqli_query($connection, $queryCliente);

    if ($resultUsuario && mysqli_num_rows($resultUsuario) > 0) {
        $row = mysqli_fetch_assoc($resultUsuario);
        $nivel = $row['nivel'];
    } elseif ($resultCliente && mysqli_num_rows($resultCliente) > 0) {
        $row = mysqli_fetch_assoc($resultCliente);
        $_SESSION['nickname'] = $row['nickname_cliente'];
        $nivel = 'cliente';
    } else {
        echo "<h2 style='color:brown'>Não encontramos seu cadastro :/</h2><br>";
        echo "<h2 style='color:black'>Gostaria de se cadastrar agora?</h2><br>";
        echo "<a style='color:blue' href='../pages/register.php'>Cadastrar-se</a><br>";
        echo "<a style='color:blue' href='../pages/login.php'>Voltar a página de login</a>";
        exit;
    }

    if (password_verify($password, $row['senha_usuario'])) {
        $_SESSION['id_usuario'] = $row['id_usuario']; // Armazena o ID do usuário na sessão
        $_SESSION['nivel'] = $nivel; // Armazena o nível do usuário na sessão

        echo "<h2 style='color:green'>Login bem-sucedido!</h2>";

        header("refresh:3; url=../$nivel/logado.php");

       
    } else {
        echo "<h2 style='color:red'>Senha incorreta</h2>";
    }
}
?>