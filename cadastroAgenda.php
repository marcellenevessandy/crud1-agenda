<?php 
include "funcoesAgenda.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"]) && isset($_POST["telefone"])) {
    $novoNome = $_POST["nome"];
    $novoTelefone = $_POST["telefone"];

    salvarContato($novoNome, $novoTelefone);
    echo "Contato cadastrado com sucesso!";
}


if (isset($_GET["excluir"])) {
    $index = $_GET["excluir"];
    excluirContato($index);
    header("Location: cadastroAgenda.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Contato</title>
    <link rel="stylesheet" href="./cadastroAge.css">

</head>
<body>
  <div class="container">
    <h2>Cadastre um Novo Contato</h2>
    <form method="post" action="cadastroAgenda.php">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" required>
      
      <label for="telefone">Telefone:</label>
      <input type="text" name="telefone" id="telefone" required>
      
      <button type="submit">Cadastrar</button>
    </form>
    
    <h3>Contatos Cadastrados</h3>
    <?php
    $contatos = carregarContatos();
    if (empty($contatos)) {
        echo "<p>Nenhum contato cadastrado.</p>";
    } else {
        echo "<ul>";
        foreach ($contatos as $index => $contato) {
            echo "<li>";
            echo htmlspecialchars($contato['nome']) . " - " . htmlspecialchars($contato['telefone']);
            echo "<a href='?excluir=$index'>Excluir</a> | ";
            echo "<a href='alterarAgenda.php?alterar=$index'>Alterar</a>";
            echo "</li>";
        }
        echo "</ul>";
    }
    ?>
    <a href="index.php" class="voltar">Voltar</a>
  </div>
</body>


</html>
