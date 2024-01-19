<?php
session_start();

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'cliente') {
    header("Location: ../../pages/login.php");
    exit();
}

include '../../config/connect.php';
$connection = connectNew();

$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT u.nome_usuario, u.email_usuario, c.* FROM usuarios u
        JOIN clientes c ON u.id_usuario = c.id_usuario
        WHERE u.id_usuario = $id_usuario";

$resultado = $connection->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Meu Perfil</title>
    </head>
    <body>
        <h1>Seu Perfil</h1>

        <form action="../config/action_alteracoes.php" method="post">
            <p>Nome: <input type="text" name="nome" value="<?php echo $row['nome_usuario']; ?>"></p>
            <p>Email: <?php echo $row['email_usuario']; ?></p>
            <p>Senha: ********  <a href="./alterar_senha.php">ALTERAR SENHA?</a></p> 

            <p>Nickname: <?php echo $row['nickname_cliente']; ?></p>
            <p>Telefone: <input type="text" name="telefone" value="<?php echo $row['telefone_cliente']; ?>"></p>

            <h1>Endereço</h1>
            <p>CEP: <input type="text" name="cep" value="<?php echo $row['cep']; ?>"></p>
            <p>RUA: <input type="text" name="rua" value="<?php echo $row['rua']; ?>"></p>
            <p>Nº: <input type="text" name="numero" value="<?php echo $row['numero']; ?>"></p>
            <p>BAIRRO: <input type="text" name="bairro" value="<?php echo $row['bairro']; ?>"></p>
            <p>CIDADE: <input type="text" name="cidade" value="<?php echo $row['cidade']; ?>"></p>
            <p>ESTADO: <input type="text" name="uf" value="<?php echo $row['uf']; ?>"></p>

            <input type="submit" value="Salvar todas as Alterações">
        </form>
    </body>
    </html>
    <?php
} else {
    echo "Cliente não encontrado.";
}

$connection->close();
?>
