<h2>Criar Nova Conta</h2>
<form action="index.php" method="POST">
    <input type="hidden" name="tipo" value="cadastro">

    <input type="text" name="nome" placeholder="Seu Nome" required><br>
    <input type="email" name="email" placeholder="Seu E-mail" required><br>
    <input type="password" name="senha" placeholder="Sua Senha" required><br>

    <button type="submit" class="btn">CADASTRAR</button>
</form>
<br>
<a href="index.php?pagina=login">Voltar para Login</a>