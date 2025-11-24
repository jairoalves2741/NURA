<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <link rel="manifest" href="/NURA/manifest.json">
  <meta charset="UTF-8">
  <title>Nura - Carrinho</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
  <script src="script.js"></script>

  <header>
    <div class="container header-inner">
      <!-- Logo -->
      <a href="index.php" class="logo">
        Nura<span>.</span>
      </a>

      <nav class="nav-links">
        <a href="index.php">Início</a>
        <a href="index.php?page=produtos">Produtos</a>
      </nav>
    </div>
  </header>

  <main class="container" style="padding: 3rem 0; max-width: 800px;">
    <h1 style="margin-bottom: 2rem;">Seu Carrinho</h1>

    <div class="order-card" style="display: flex; gap: 1rem; align-items: center; padding: 1rem;">
      <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500" alt="Bowl"
        style="width: 80px; height: 80px; object-fit: cover; border-radius: var(--radius);">

      <div style="flex: 1;">
        <h3 style="font-size: 1rem;">Bowl Verde Vitality</h3>
        <div style="color: var(--primary); font-weight: 700;">R$ 32,90</div>
      </div>

      <div style="display: flex; align-items: center; gap: 0.5rem;">
        <button class="btn btn-ghost" style="border: 1px solid var(--border); padding: 0.3rem 0.6rem;">-</button>
        <span>1</span>
        <button class="btn btn-ghost" style="border: 1px solid var(--border); padding: 0.3rem 0.6rem;">+</button>
        <button class="btn btn-ghost" style="color: #ef4444;"><i class="ph ph-trash"></i></button>
      </div>
    </div>

    <div style="background: var(--secondary); padding: 1.5rem; border-radius: var(--radius); margin-top: 2rem;">
      <div style="display: flex; justify-content: space-between; margin-bottom: 0.8rem;">
        <span>Subtotal</span>
        <span>R$ 32,90</span>
      </div>

      <div style="display: flex; justify-content: space-between; margin-bottom: 0.8rem;">
        <span>Entrega</span>
        <span>R$ 10,00</span>
      </div>

      <div
        style="display: flex; justify-content: space-between; border-top: 1px solid rgba(0,0,0,0.1); padding-top: 1rem; font-size: 1.2rem; font-weight: 700; color: var(--primary);">
        <span>Total</span>
        <span>R$ 42,90</span>
      </div>

      <!-- Botão de finalizar pedido → vai para login/cadastro -->
      <button class="btn btn-primary btn-full" style="margin-top: 1rem;"
        onclick="window.location.href='index.php?page=cadastro'">
        Finalizar Pedido
      </button>
    </div>
  </main>





</body>

</html>