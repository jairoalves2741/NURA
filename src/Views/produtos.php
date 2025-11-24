<?php
// Views/produtos.php
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <link rel="manifest" href="/NURA/manifest.json">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nura - Produtos</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
  <script src="script.js"></script>


  <header>
    <div class="container header-inner">
      <a href="index.php" class="logo">Nura<span>.</span></a>

      <nav class="nav-links">
        <a href="index.php">Início</a>
        <a href="index.php?page=produtos" style="color: var(--primary); font-weight: bold;">Produtos</a>
        <a href="index.php?page=cadastro">Minha Conta</a>
      </nav>

      <div class="header-actions">
        <a href="index.php?page=carrinho" class="btn btn-ghost" aria-label="Carrinho">
          <i class="ph ph-shopping-cart"></i>
        </a>
      </div>
    </div>
  </header>

  <!-- MAIN -->
  <main class="container" style="padding: 3rem 0;">
    <div style="text-align: center; margin-bottom: 3rem;">
      <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">Nossos Produtos</h1>
      <p style="color: var(--muted);">Explore nosso cardápio completo de refeições saudáveis.</p>
    </div>

    <!-- FILTROS -->
    <div style="display: flex; justify-content: center; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 2rem;">
      <button class="btn btn-primary">Todos</button>
      <button class="btn btn-ghost" style="border: 1px solid var(--border);">Bowls</button>
      <button class="btn btn-ghost" style="border: 1px solid var(--border);">Saladas</button>
      <button class="btn btn-ghost" style="border: 1px solid var(--border);">Sucos</button>
    </div>

    <!-- PRODUTOS -->
    <div class="address-grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));">

      <!-- ITEM 1 -->
      <div class="card">
        <div class="card-img-wrapper">
          <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500" alt="Bowl Verde Vitality"
            class="card-img">
        </div>
        <div class="card-content">
          <h3 class="card-title">Bowl Verde Vitality</h3>
          <p class="card-desc">Mix de folhas, abacate, quinoa e grão de bico.</p>
          <div class="card-price">R$ 32,90</div>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary btn-full"><i class="ph-bold ph-shopping-cart"></i> Adicionar</button>
        </div>
      </div>

      <!-- ITEM 2 -->
      <div class="card">
        <div class="card-img-wrapper">
          <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=500" alt="Salada Color Nura"
            class="card-img">
        </div>
        <div class="card-content">
          <h3 class="card-title">Salada Color Nura</h3>
          <p class="card-desc">Tomate cereja, pepino, rabanete e sementes.</p>
          <div class="card-price">R$ 28,50</div>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary btn-full"><i class="ph-bold ph-shopping-cart"></i> Adicionar</button>
        </div>
      </div>

      <!-- ITEM 3 -->
      <div class="card">
        <div class="card-img-wrapper">
          <img src="https://images.unsplash.com/photo-1540420773420-3366772f4999?w=500" alt="Smoothie Detox"
            class="card-img">
        </div>
        <div class="card-content">
          <h3 class="card-title">Smoothie Detox</h3>
          <p class="card-desc">Couve, maçã, gengibre e limão.</p>
          <div class="card-price">R$ 18,00</div>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary btn-full"><i class="ph-bold ph-shopping-cart"></i> Adicionar</button>
        </div>
      </div>

    </div>
  </main>

  <!-- FOOTER -->
  <footer>
    <div class="container" style="text-align: center; padding: 2rem 0; color: var(--muted); font-size: 0.9rem;">
      <p>&copy; 2025 Nura. Todos os direitos reservados.</p>
    </div>
  </footer>





</body>

</html>