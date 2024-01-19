<?php

include 'connect.php';

$connection = connectNew();


$caracteres_sem_acento = array(
    'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Â'=>'Z', 'Â'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
    'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
    'Ï'=>'I', 'Ñ'=>'N', 'Å'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
    'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
    'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
    'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'Å'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
    'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
    'Ä'=>'a', 'î'=>'i', 'â'=>'a', 'È'=>'s', 'È'=>'t', 'Ä'=>'A', 'Î'=>'I', 'Â'=>'A', 'È'=>'S', 'È'=>'T',
);


$nome = strtr(filter_input(INPUT_POST, "nome"), $caracteres_sem_acento);
$nickname = strtr(filter_input(INPUT_POST, "nickname"), $caracteres_sem_acento);
$email = strtolower(strtr(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL), $caracteres_sem_acento));
$telefone = strtr(filter_input(INPUT_POST, "telefone"), $caracteres_sem_acento);
$senha = strtr(filter_input(INPUT_POST, "senha"), $caracteres_sem_acento);
//ENDEREÇO
$cep = strtr(filter_input(INPUT_POST, "cep"), $caracteres_sem_acento);
$rua = strtr(filter_input(INPUT_POST, "rua"), $caracteres_sem_acento);
$bairro = strtr(filter_input(INPUT_POST, "bairro"), $caracteres_sem_acento);
$cidade = strtr( filter_input(INPUT_POST, "cidade"), $caracteres_sem_acento);
$uf = strtoupper(strtr(filter_input(INPUT_POST, "uf"), $caracteres_sem_acento));
$numero = strtr(filter_input(INPUT_POST, "numero"), $caracteres_sem_acento);






if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["enviar"])) {

    if (!empty([$nome, $nickname, $email, $telefone, $senha])) {
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

                    $queryCliente = "INSERT INTO clientes (id_usuario, nickname_cliente, telefone_cliente, cep, bairro, cidade, rua, numero, uf) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt2 = mysqli_prepare($connection, $queryCliente);

                    mysqli_stmt_bind_param($stmt2, "issssssss", $idUsuario, $nickname, $telefone, $cep, $bairro, $cidade, $rua, $numero, $uf);
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