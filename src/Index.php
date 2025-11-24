<?php
// src/index.php

// Carregue os controladores
require_once __DIR__ . '/Controller/AdministradorController.php';
require_once __DIR__ . '/Controller/ClienteController.php';
require_once __DIR__ . '/Controller/ProdutoController.php';
require_once __DIR__ . '/Controller/PedidoController.php';

// Instancie os controladores
$admController = new AdministradorController();
$clienteController = new ClienteController();
$produtoController = new ProdutoController();
$pedidoController = new PedidoController();

// Verifique qual página foi solicitada via parâmetro GET
$page = isset($_GET['page']) ? $_GET['page'] : 'index'; // Padrão é 'index'

// Exibir a view correspondente
switch ($page) {
    case 'cadastro':
        require __DIR__ . '/Views/cadastro.php';
        break;

    case 'carrinho':
        require __DIR__ . '/Views/carrinho.php';
        break;

    case 'perfil':
        require __DIR__ . '/Views/perfil.php';
        break;

    case 'produtos':  // ATENÇÃO: aqui é produtos.php, não produto.php
        require __DIR__ . '/Views/produtos.php';
        break;

    case 'index':
    default:
        require __DIR__ . '/Views/index.php';
        break;
}

?>