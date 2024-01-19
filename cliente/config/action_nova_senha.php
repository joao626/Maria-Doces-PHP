<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../../config/connect.php';
    $connection = connectNew();

    $id_usuario = $_POST['id_usuario'];
    $novaSenha = $_POST['novaSenha'];
    $confirmarSenha = $_POST['confirmarSenha'];

    if ($novaSenha == $confirmarSenha) {
        $hashedSenha = password_hash($novaSenha, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios SET senha_usuario = '$hashedSenha' WHERE id_usuario = $id_usuario";

        if ($connection->query($sql) === TRUE) {
            echo "Nova senha criada com sucesso.";
            header("refresh:3; url=../logado.php");
        } else {
            echo "Erro ao criar a nova senha: " . $connection->error;
        }
    } else {
        echo "As senhas não coincidem.";
    }

    $connection->close();
} else {
    echo "Método de requisição inválido.";
}
?>
