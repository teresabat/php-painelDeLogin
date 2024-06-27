<?php
//perfil.php

session_start();

// verirfica se o usuario esta logado

if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redireciona para a pagina de login se nao estiver logado
    exit();

}

// exibe o perfil do usuario

echo "Bem vindo " . $_SESSION['nome'] . "! Seu Id de usuário é " . $_SESSION['id'];

// aqui pode adicionar mais informações do perfil ou opções de logout
?>