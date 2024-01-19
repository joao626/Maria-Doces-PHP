<?php
session_start();

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'admin') {
    header("Location: login.php");
    exit();
}

include '../../config/connect.php';
$connection = connectNew();

$pesquisa = isset($_GET['pesquisar']) ? mysqli_real_escape_string($connection, $_GET['pesquisar']) : ''; //verificando pesquisa

$query = "SELECT * FROM usuarios";
if (!empty($pesquisa)) {
    $query .= " WHERE nome_usuario LIKE '%$pesquisa%'"; // Atualiza a query caso aja pesquisa
}

$result = $connection->query($query);
?>

<div>
    <h3 style="display: flex; justify-content: space-between; align-items: center; font-size: 1.2em;"> Usuários do Site
    
        <form method="GET" action="">
            <input type="text" name="pesquisar" placeholder="Pesquisar por usuário..." style="margin-right: 20px; 
            font-size: 0.8em; border-radius: 8px; padding: 8px;" value="<?php echo $pesquisa; ?>">
            <input type="submit" value="Pesquisar">
        </form>

        <a href="../CRUDS/criar_usuario.php" class="add-button" title="Adicionar novo usuário" style="font-size: 1.5em; border-radius: 50%; padding: 10px;">+</a>
    </h3>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Nível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['nome_usuario']; ?></td>
                    <td><?php echo $row['email_usuario']; ?></td>
                    <td><?php echo $row['nivel']; ?></td>
                    <td>
                        <a href='../CRUDS/editar_usuario.php?id_usuario=<?php echo $row['id_usuario']; ?>'>Editar</a> |
                        <a href='../config/excluirUsuario.php?id_usuario=<?php echo $row['id_usuario']; ?>'>Excluir</a>
                        <!-- excluir dinamico?  -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
