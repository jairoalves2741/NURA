<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="manifest" href="/NURA/manifest.json">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nura - Meu Perfil</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
    <script src="script.js"></script>

    <header>
        <div class="container header-inner">
            <a href="index.php" class="logo">
                Nura<span>.</span>
            </a>

            <div class="nav-links">
                <a href="index.php">Início</a>
                <a href="index.php?page=produtos">Produtos</a>
                <a href="index.php?page=carrinho">Carrinho</a>
            </div>

            <div class="header-actions">
                <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem; font-weight: 500;">
                    <span id="header-user-name">Carregando...</span>
                    <div style="width: 35px; height: 35px; background: var(--secondary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary); font-weight: bold;"
                        id="header-user-avatar">
                        -
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container" style="padding: 3rem 1.5rem;">

        <h1 style="font-size: 2rem; margin-bottom: 2rem;">Minha Conta</h1>

        <div class="profile-grid">

            <aside class="profile-sidebar">
                <nav class="sidebar-menu">
                    <button class="sidebar-link tab-btn active" data-target="personal-data">
                        <i class="ph ph-user"></i> Dados Pessoais
                    </button>
                    <button class="sidebar-link tab-btn" data-target="orders">
                        <i class="ph ph-package"></i> Meus Pedidos
                    </button>
                    <button class="sidebar-link tab-btn" data-target="addresses">
                        <i class="ph ph-map-pin"></i> Endereços
                    </button>

                    <div style="height: 1px; background: var(--border); margin: 0.5rem 0;"></div>

                    <button id="btn-logout" class="sidebar-link" style="color: #ef4444;">
                        <i class="ph ph-sign-out"></i> Sair
                    </button>
                </nav>
            </aside>

            <section class="profile-content">

                <!-- DADOS PESSOAIS -->
                <div id="personal-data" class="form-content active">
                    <div class="card" style="box-shadow: none; padding: 0; border: none;">
                        <div class="card-content" style="padding: 0;">
                            <h2 style="font-size: 1.5rem; margin-bottom: 1.5rem;">Seus Dados</h2>

                            <form id="form-perfil">
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                    <div class="form-group">
                                        <label for="input-nome">Nome</label>
                                        <input type="text" id="input-nome" class="input" placeholder="Seu nome">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-sobrenome">Sobrenome</label>
                                        <input type="text" id="input-sobrenome" class="input"
                                            placeholder="Seu sobrenome">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="input-email">Email</label>
                                    <input type="email" id="input-email" class="input" placeholder="seu@email.com"
                                        disabled
                                        style="background: var(--secondary); opacity: 0.7; cursor: not-allowed;">
                                </div>

                                <div class="form-group">
                                    <label for="input-telefone">Telefone</label>
                                    <input type="tel" id="input-telefone" class="input" placeholder="(00) 00000-0000">
                                </div>

                                <div style="margin-top: 1rem;">
                                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- PEDIDOS -->
                <div id="orders" class="form-content">
                    <h2 style="font-size: 1.5rem; margin-bottom: 1.5rem;">Histórico de Pedidos</h2>
                    <div id="lista-pedidos"></div>
                </div>

                <!-- ENDEREÇOS -->
                <div id="addresses" class="form-content">
                    <div
                        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <h2 style="font-size: 1.5rem; margin: 0;">Meus Endereços</h2>
                    </div>

                    <div class="address-grid" id="lista-enderecos"></div>
                </div>

            </section>
        </div>
    </main>

    <footer>
        <div class="container" style="text-align: center; padding: 2rem 0;">
            <p style="color: var(--muted); font-size: 0.85rem;">&copy; 2025 Nura. Todos os direitos reservados.</p>
        </div>
    </footer>




</body>

</html>