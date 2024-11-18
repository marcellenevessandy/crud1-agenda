<?php
// Carregar usuários do arquivo
function carregarUsuarios() {
    $usuarios = [];
    
    if (file_exists("usuarios.txt")) {
        $dados = file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($dados as $linha) {
            list($usuario, $senha) = explode(":", $linha);
            $usuarios[] = ["usuario" => $usuario, "senha" => $senha];
        }
    }
    
    return $usuarios;
}

// Salvar um novo usuário no arquivo
function salvarUsuario($usuario, $senha) {
    $linha = $usuario . ":" . $senha . PHP_EOL;
    file_put_contents("usuarios.txt", $linha, FILE_APPEND);
}

// Listar usuários cadastrados
function listarUsuarios() {
    $usuarios = carregarUsuarios();
    
    echo "<ul>";
    foreach ($usuarios as $index => $user) {
        echo "<li>" . htmlspecialchars($user["usuario"]) .
             " <a href='cadastro.php?excluir=" . $index . "'>Excluir</a> | " .
             "<a href='alterar.php?editar=" . $index . "'>Alterar</a></li>";
    }
    echo "</ul>";
}

// Excluir um usuário pelo índice
function excluirUsuario($index) {
    $usuarios = carregarUsuarios(); 
    
    if (isset($usuarios[$index])) {
        unset($usuarios[$index]);
        file_put_contents("usuarios.txt", "");
        foreach ($usuarios as $user) {
            salvarUsuario($user["usuario"], $user["senha"]);
        }
    }
}

// Alterar um usuário pelo índice
function alterarUsuario($index, $novoUsuario, $novaSenha) {
    $usuarios = carregarUsuarios();
    
    if (isset($usuarios[$index])) {
        $usuarios[$index] = ["usuario" => $novoUsuario, "senha" => $novaSenha];
        file_put_contents("usuarios.txt", "");
        foreach ($usuarios as $user) {
            salvarUsuario($user["usuario"], $user["senha"]);
        }
    }
}
?>