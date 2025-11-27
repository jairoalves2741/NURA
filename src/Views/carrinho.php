<h2>Seu Carrinho</h2>

<?php if (empty($_SESSION['carrinho'])): ?>
  <p>O carrinho está vazio.</p>
  <a href="index.php?pagina=produtos" class="btn">Voltar às compras</a>
<?php else: ?>

  <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
    <tr style="background:#eee;">
      <th>Produto</th>
      <th>Preço</th>
      <th>Ação</th>
    </tr>
    <?php
    $total = 0;
    foreach ($_SESSION['carrinho'] as $index => $item):
      $total += $item['preco'];
      ?>
      <tr>
        <td style="padding:10px;"><?php echo $item['nome']; ?></td>
        <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
        <td>
          <a href="index.php?acao=del&index=<?php echo $index; ?>" style="color:red; text-decoration:none;">Remover</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

  <h3 style="margin-top: 20px;">Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h3>

  <?php if (isset($_SESSION['user_nome'])): ?>
    <a href="index.php?acao=limpar" class="btn">FINALIZAR PEDIDO</a>
  <?php else: ?>
    <p style="color: red;">Faça login para finalizar.</p>
    <a href="index.php?pagina=login" class="btn">Entrar na Conta</a>
  <?php endif; ?>

<?php endif; ?>