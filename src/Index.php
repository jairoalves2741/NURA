<?php
// Arquivo: src/index.php

require_once 'Controller/UsuarioController.php';

// 1. Lógica de salvar (Se enviou formulário)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new UsuarioController();
    $msg = $controller->criarNovo($_POST['nome'], $_POST['email'], $_POST['senha']);

    // Mostra mensagem simples e um botão de voltar
    echo "<h1>$msg</h1>";
    echo "<a href='index.php'>Voltar para Home</a>";
    exit;
}

// 2. Lógica de Navegação (O Router)
// Pega o que está escrito na URL (ex: index.php?pagina=cadastro)
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';

if ($pagina == 'cadastro') {
    include 'Views/cadastro.php'; // Mostra a tela de cadastro
} else {
    include 'Views/home.php'; // Mostra a home (padrão)
}
?>