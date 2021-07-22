<?php
// Salvar como: admin/acesso_com.php
// A sessão precisa ser iniciada em cada página diferente
// Se a sessão não existir, iniciar uma
// Determinar o nível de acesso se necessário
// Inicia a sessão
session_name("chulettaaa");

if(!isset($_SESSION)){
    session_start();
};

// verificar se o usuário está logado na sessão
// identifica o usuario
if(!isset($_SESSION['login_usuario'])){
    // Se não existir redirecionamos a sessão por segurança
    header("Location: login.php"); exit;
};

$nome_da_sessao =   session_name();

// verificar o nome da sessão
if(!isset($_SESSION['nome_da_sessao']) OR ($_SESSION['nome_da_sessao']!=$nome_da_sessao)){
    // Se não existir, destruimos a sessão por segurança
    session_destroy();
    header("Location: login.php"); exit;
};

// verificar se o login é válido
if(!isset($_SESSION['login_usuario'])){
    // Se não existir, destruimos a sessão por segurança
    session_destroy();
    header("Location: login.php"); exit;
};
?>