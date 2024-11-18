<?php
include "funcoes.php";

if (isset($_GET["editar"])) {
    $index = $_GET["editar"];
    $usuarios = carregarUsuarios();

    if (isset($usuarios[$index])) {
        $usuarioAtual = $usuarios[$index]["usuario"];
        $senhaAtual = $usuarios[$index]["senha"];
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["senha"])) {
    $novoUsuario = $_POST["usuario"];
    $novaSenha = $_POST["senha"];
    alterarUsuario($index, $novoUsuario, $novaSenha);
    header("Location: cadastro.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Alterar Usuário</title>
    <link rel="stylesheet" href="./alterar.css">

</head>

<body>

    <form method="post" action="">
        <h2>Alterar Usuário</h2>
        <label for="usuario">Nome de Usuário:</label>
        <input type="text" name="usuario" id="usuario" value="<?php echo htmlspecialchars($usuarioAtual); ?>" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" value="<?php echo htmlspecialchars($senhaAtual); ?>" required>

        <button type="submit">Salvar Alterações</button>
        
        <a href="index.php">Voltar</a>
    </form>
</body>

</html>