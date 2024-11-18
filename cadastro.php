<?php
include "funcoes.php";

// Processa cadastro de usuário
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["senha"])) {
    $novoUsuario = $_POST["usuario"];
    $novaSenha = $_POST["senha"];

    salvarUsuario($novoUsuario, $novaSenha);
    echo "Usuário cadastrado com sucesso!";
}

// Processa exclusão de usuário
if (isset($_GET["excluir"])) {
    $index = $_GET["excluir"];
    excluirUsuario($index);
    header("Location: cadastro.php"); // Redireciona para evitar reenvio do formulário
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="./cadastro.css">

</head>
<body>
  <div class="container">
    <h2>Cadastre um Novo Usuário</h2>
    <form method="post" action="cadastro.php">
      <label for="usuario">Nome de Usuário:</label>
      <input type="text" name="usuario" id="usuario" required>
      
      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="senha" required>
      
      <button type="submit">Cadastrar</button>
    </form>
    
    <h3>Usuários Cadastrados</h3>
    <?php
      listarUsuarios(); // Exibe a lista de usuários com opções de exclusão e alteração
    ?>
    
    <a href="login.php" class="voltar">Voltar</a>
  </div>
</body>

</html>