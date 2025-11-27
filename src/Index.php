<?php
session_start(); // 1. Inicia a memória do site

require_once 'Controller/UsuarioController.php';
$controller = new UsuarioController();

// --- 2. LISTA DE PRODUTOS (SIMULAÇÃO) ---
$listaProdutos = [
    1 => ['nome' => 'Bowl Verde Vitality', 'preco' => 32.90, 'img' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=300'],
    2 => ['nome' => 'Salada Color Nura', 'preco' => 28.50, 'img' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=300'],
    3 => ['nome' => 'Smoothie Detox', 'preco' => 18.00, 'img' => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=300']
];

// --- 3. LÓGICA DO CARRINHO ---
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adicionar Item
if (isset($_GET['acao']) && $_GET['acao'] == 'add' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($listaProdutos[$id])) {
        $_SESSION['carrinho'][] = $listaProdutos[$id];
    }
    header('Location: index.php?pagina=carrinho');
    exit;
}

// Remover Item do Carrinho
if (isset($_GET['acao']) && $_GET['acao'] == 'del' && isset($_GET['index'])) {
    array_splice($_SESSION['carrinho'], $_GET['index'], 1);
    header('Location: index.php?pagina=carrinho');
    exit;
}

// Finalizar Compra
if (isset($_GET['acao']) && $_GET['acao'] == 'limpar') {
    $_SESSION['carrinho'] = [];
    header('Location: index.php?pagina=home&msg=Pedido realizado!');
    exit;
}

// --- 4. LÓGICA DE USUÁRIO (POST - LOGIN/CADASTRO) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Login
    if (isset($_POST['tipo']) && $_POST['tipo'] == 'login') {
        if ($controller->autenticar($_POST['email'], $_POST['senha'])) {
            header('Location: index.php?pagina=home');
            exit;
        } else {
            $erro = "Login inválido!";
        }
    }
    // Cadastro
    if (isset($_POST['tipo']) && $_POST['tipo'] == 'cadastro') {
        $msg = $controller->registrar($_POST['nome'], $_POST['email'], $_POST['senha']);
        header("Location: index.php?pagina=login&msg=$msg");
        exit;
    }
}

// --- 5. LÓGICA DE AÇÕES (GET - SAIR/DELETAR) ---

// Sair (Logout)
if (isset($_GET['sair'])) {
    session_destroy();
    header('Location: index.php?pagina=login');
    exit;
}

// Deletar Conta (NOVO)
if (isset($_GET['acao']) && $_GET['acao'] == 'deletar_conta') {
    if (isset($_SESSION['user_id'])) {
        // Chama o controller para apagar do banco
        $controller->deletarUsuario($_SESSION['user_id']);

        // Destrói a sessão e manda pra home
        session_destroy();
        header('Location: index.php?pagina=home&msg=Conta excluída com sucesso.');
        exit;
    }
}

// --- 6. ROTEADOR (DECIDE O QUE MOSTRAR) ---
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';
$usuarioLogado = isset($_SESSION['user_nome']) ? $_SESSION['user_nome'] : null;

// Só agora começa o HTML
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Nura Alimentação</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <header>
            <nav>
                <a href="index.php?pagina=home">NURA.</a>
                <a href="index.php?pagina=home">Início</a>
                <a href="index.php?pagina=produtos">Cardápio</a>
                <a href="index.php?pagina=carrinho">Carrinho (<?php echo count($_SESSION['carrinho']); ?>)</a>

                <?php if ($usuarioLogado): ?>
                    <a href="index.php?pagina=perfil">Perfil (<?php echo $usuarioLogado; ?>)</a>
                <?php else: ?>
                    <a href="index.php?pagina=login">Entrar</a>
                <?php endif; ?>
            </nav>
        </header>

        <main>
            <?php
            // Exibe mensagens de sucesso ou erro
            if (isset($_GET['msg']))
                echo "<p style='color:green; font-weight:bold; background:#e0ffe0; padding:10px; border-radius:5px;'>" . $_GET['msg'] . "</p>";
            if (isset($erro))
                echo "<p style='color:red; font-weight:bold; background:#ffe0e0; padding:10px; border-radius:5px;'>$erro</p>";

            // Carrega a página correta
            switch ($pagina) {
                case 'produtos':
                    include 'Views/produtos.php';
                    break;
                case 'carrinho':
                    include 'Views/carrinho.php';
                    break;
                case 'login':
                    include 'Views/login.php';
                    break;
                case 'cadastro':
                    include 'Views/cadastro.php';
                    break;
                case 'perfil':
                    // Proteção: se não estiver logado, manda pro login
                    if (!$usuarioLogado) {
                        header('Location: index.php?pagina=login');
                        exit;
                    }
                    include 'Views/perfil.php';
                    break;
                case 'home':
                default:
                    include 'Views/home.php';
                    break;
            }
            ?>
        </main>

    </div>
</body>

</html>