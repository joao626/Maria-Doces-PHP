<?php 
session_start();

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'cliente') {
    header("Location: ../../pages/login.php");
    exit();
}

include '../../config/connect.php';
$connection = connectNew();

$id_usuario = $_SESSION['id_usuario'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    // Atualizar os dados no banco de dados
    $sql = "UPDATE clientes SET 
            telefone_cliente = '$telefone',
            cep = '$cep',
            rua = '$rua',
            numero = '$numero',
            bairro = '$bairro',
            cidade = '$cidade',
            uf = '$uf'
            WHERE id_usuario = $id_usuario";
    $sql2 = "UPDATE usuarios SET nome_usuario = '$nome' WHERE id_usuario = $id_usuario;";

    if ($connection->query($sql) === TRUE && $connection->query($sql2) === TRUE) {
        echo "Alterações salvas com sucesso.";
    } else {
        echo "Erro ao salvar as alterações: " . $connection->error;
    }
}


?>