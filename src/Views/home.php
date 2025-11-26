<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nura - Alimentação Saudável</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>

    <header>
        <div class="container header-inner">
            <a href="index.php" class="logo">Nura<span>.</span></a>
            <nav class="nav-links">
                <a href="index.php" style="color: green; font-weight: bold;">Início</a>
                <a href="#">Produtos</a> <a href="#">Minha Conta</a>
            </nav>
            <div class="header-actions">
                <a href="#" class="btn btn-ghost"><i class="ph ph-user"></i></a>
                <a href="#" class="btn btn-ghost"><i class="ph ph-shopping-cart"></i></a>
            </div>
        </div>
    </header>

    <main>
        <section style="padding: 4rem 0; text-align: center; background: #fdfdfd;">
            <div class="container">
                <h1 style="font-size: 3rem;">Alimentação Saudável <br> <span style="color: green;">Feita com Amor</span>
                </h1>
                <p>Descubra refeições deliciosas e nutritivas.</p>
                <br>
                <a href="index.php?acao=listar"
                    style="background: green; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                    Testar Conexão PHP (Ver JSON)
                </a>
            </div>
        </section>

        <section class="container" style="padding: 2rem;">
            <h2 style="text-align: center;">Destaques</h2>
            <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; margin-top: 20px;">

                <div style="border: 1px solid #ddd; padding: 10px; width: 250px;">
                    <h3>Bowl Verde</h3>
                    <p>R$ 32,90</p>
                </div>

                <div style="border: 1px solid #ddd; padding: 10px; width: 250px;">
                    <h3>Salada Color</h3>
                    <p>R$ 28,50</p>
                </div>

            </div>
        </section>
    </main>

    <footer style="text-align: center; padding: 2rem; background: #eee; margin-top: 2rem;">
        <p>&copy; 2025 Nura. Todos os direitos reservados.</p>
    </footer>

</body>

</html>