<h2>Nosso Cardápio</h2>
<div class="grid-produtos">
  <?php foreach ($listaProdutos as $id => $produto): ?>
    <div class="card">
      <img src="<?php echo $produto['img']; ?>" alt="Foto">
      <h3><?php echo $produto['nome']; ?></h3>
      <p>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>

      <a href="index.php?acao=add&id=<?php echo $id; ?>" class="btn">
        Adicionar
      </a>
    </div>
  <?php endforeach; ?>
</div>