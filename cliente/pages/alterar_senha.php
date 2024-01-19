<?php 
session_start();

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'cliente') {
    header("Location: ../../pages/login.php");
    exit();
}

include '../../config/connect.php';
$connection = connectNew();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Nova Senha</title>
</head>
<body>
    <h1>Criar Nova Senha</h1>

    <form action="../config/action_nova_senha.php" method="post">
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario'] ?>">
        <label for="novaSenha">Nova Senha:</label>
        <input type="password" id="novaSenha" name="novaSenha" required>

        <label for="confirmarSenha">Confirmar Senha:</label>
        <input type="password" id="confirmarSenha" name="confirmarSenha" required>

        <input type="submit" value="Criar Nova Senha">
    </form>

    <script>
            var password = document.getElementById("novaSenha"), confirm_password = document.getElementById("confirmarSenha");

            function validatePassword(){
                if(password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Senhas diferentes!");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>



</body>
</html>

<?php
$connection->close();
?>