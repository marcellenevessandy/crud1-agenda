<?php
include "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $usuarioValido = false;

    // Carrega os usuários do arquivo
    $usuarios = carregarUsuarios();

    // Verifica se o usuário e senha estão no vetor de usuários
    foreach ($usuarios as $user) {
        if ($user["usuario"] === $usuario && $user["senha"] === $senha) {
            $usuarioValido = true;
            break;
        }
    }

    if ($usuarioValido) {
        // Define o cookie para o login por 5 minutos (300 segundos)
        setcookie("usuario_logado", $usuario, time() + 300, "/");
        header("Location: index.php");
        exit;
    } else {
        echo "Usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./login.css">

</head>

<body>

    <div class="conteiner sessao">

        <form method="post" action="login.php">

            <h2>Login de Usuário</h2>
            <label for="usuario">Login:</label><br>
            <input type="text" name="usuario" id="usuario" required><br>

            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" id="senha" required><br>
            <br>

            <a href="cadastro.php">Cadastre-se</a>

            <div class="center">

                <input type="submit" name="salvar" value="Entrar" id="salvar">

            </div>

        </form>
        <br>


    </div>



</body>

</html>