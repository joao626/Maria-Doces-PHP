<?php

include 'connect.php';

$connection = connectNew();

$nome = filter_input(INPUT_POST, "nome");
$nickname = filter_input(INPUT_POST, "nickname");
$email = strtolower(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL));
$endereco = filter_input(INPUT_POST, "endereco");
$telefone = filter_input(INPUT_POST, "telefone");
$senha = filter_input(INPUT_POST, "senha");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["enviar"])) {

    if (!empty([$nome, $nickname, $email, $telefone, $senha, $endereco])) {
        $email = mysqli_real_escape_string($connection, $email);

        $query = "SELECT * FROM usuarios WHERE email_usuario = '$email'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo "<h2 style='color:brown'>Usuário já cadastrado!</h2>";
                header("refresh:3; url=../pages/register.php");
            } else {
                $queryUsuario = "INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario, nivel) VALUES (?, ?, ?, 'cliente')";
                $stmt = mysqli_prepare($connection, $queryUsuario);

                $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senha_hashed);
                $resultCadastrar = mysqli_stmt_execute($stmt);

                if ($resultCadastrar) {
                    $idUsuario = mysqli_insert_id($connection);

                    $queryCliente = "INSERT INTO clientes (id_usuario, nickname_cliente, endereco_cliente, telefone_cliente) VALUES (?, ?, ?, ?)";
                    $stmt2 = mysqli_prepare($connection, $queryCliente);

                    mysqli_stmt_bind_param($stmt2, "isss", $idUsuario, $nickname, $endereco, $telefone);
                    $resultCadastrar2 = mysqli_stmt_execute($stmt2);

                    if ($resultCadastrar2) {
                        echo "<h2 style='color:green'>Cadastro realizado com sucesso!</h2>";

                        header("refresh:3; url=../pages/login.php");
                    } else {
                        echo "<h2 style='color:red'>Erro ao cadastrar cliente: " . mysqli_error($connection) . "</h2>";
                        $queryDelete = "delete from usuarios where email_usuario = '$email'"; //apagando usuario cadastrado...
                        mysqli_prepare($connection, $queryDelete);
                    }

                    mysqli_stmt_close($stmt2);
                } else {
                    echo "<h2 style='color:red'>Erro ao cadastrar usuário: " . mysqli_error($connection) . "</h2>";
                }

                mysqli_stmt_close($stmt);
            }
        } else {
            echo "<h2 style='color:red'>Erro na consulta: " . mysqli_error($connection) . "</h2>";
        }
    } else {
        echo "<h2 style='color:blue'>Preencha todos os campos!! </h2>";
    }
}

?>
