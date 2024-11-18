<?php
include "funcoesAgenda.php";

$_GET["alterar"];

if (isset($_GET["alterar"])) {
    $index = $_GET["alterar"];
    $contatos = carregarContatos();

    if (isset($contatos[$index])) {
        $contato = $contatos[$index];
    } else {
        die("Contato não encontrado!");
    }
} else {
    die("Nenhum contato especificado para alteração!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["alterar_index"])) {
    $index = $_POST["alterar_index"];
    $nomeAtualizado = $_POST["nome"];
    $telefoneAtualizado = $_POST["telefone"];

    alterarContato($index, $nomeAtualizado, $telefoneAtualizado);
    echo "Contato atualizado com sucesso!";
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Alterar Contato</title>
    <link rel="stylesheet" href="./alterarAge.css">
</head>

<body>

    <form method="post" action="alterarAgenda.php?alterar=<?php echo $index ?>">
        <h2>Alterar Contato</h2>

        <input type="hidden" name="alterar_index" value="<?php echo $index; ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($contato['nome']); ?>" required>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" value="<?php echo htmlspecialchars($contato['telefone']); ?>" required>

        <button type="submit">Alterar</button>

        <a href="index.php">Voltar</a>
    </form>

</body>

</html>

</html>