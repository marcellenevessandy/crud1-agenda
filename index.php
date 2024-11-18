<?php
include "funcoesAgenda.php";

if (isset($_COOKIE['usuario_logado'])) {
    $usuario = htmlspecialchars($_COOKIE['usuario_logado']);
} else {
    header("Location: login.php");
    exit;
}

if (isset($_GET["excluir"])) {
    $index = $_GET["excluir"];
    excluirContato($index);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="index.css">

    <meta charset="UTF-8">
    <title>Boas-Vindas</title>
</head>

<body>
    <div class="container">
        <h1>Agenda de contatos do(a) <?php echo $usuario; ?>:</h1>

        <form action="cadastroAgenda.php" method="get">
            <button type="submit">Cadastrar Novo Contato</button>
        </form>

        <?php
        $contatos = carregarContatos();

        if (!empty($contatos)) {
            echo "<ul>";
            foreach ($contatos as $index => $contato) {
                echo "<li>";
                echo htmlspecialchars($contato["nome"]) . " - " . htmlspecialchars($contato["telefone"]);
                echo " <a href='alterarAgenda.php?alterar=" . $index . "'>Alterar</a>";
                echo " | ";
                echo "<a href='?excluir=" . $index . "' onclick='return confirm(\"Tem certeza que deseja excluir este contato?\");'>Excluir</a>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p class='vazio'>Nenhum contato cadastrado.</p>";
        }
        ?>


        <form method="post" action="logout.php">
            <button type="submit">Sair</button>
        </form>
    </div>
</body>


</html>