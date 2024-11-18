<?php

function carregarContatos()
{
    $contatos = [];

    if (file_exists("contatos.txt")) {
        $dados = file("contatos.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($dados as $linha) {
            list($nome, $telefone) = explode(":", $linha);
            $contatos[] = ["nome" => $nome, "telefone" => $telefone];
        }
    }

    return $contatos;
}

function salvarContato($nome, $telefone)
{
    $linha = $nome . ":" . $telefone . PHP_EOL;
    file_put_contents("contatos.txt", $linha, FILE_APPEND);
}

function alterarContato($index, $novoNome, $novoTelefone)
{
    $contatos = carregarContatos();

    if (isset($contatos[$index])) {
        $contatos[$index] = ["nome" => $novoNome, "telefone" => $novoTelefone];
        file_put_contents("contatos.txt", "");
        foreach ($contatos as $user) {
            salvarContato($user["nome"], $user["telefone"]);
        }
    }
}

function excluirContato($index) {
    $contatos = carregarContatos();
    
    if (isset($contatos[$index])) {
        unset($contatos[$index]);
        file_put_contents("contatos.txt", "");
        foreach ($contatos as $user) {
            salvarContato($user["nome"], $user["telefone"]);
        }
    }
}
?>