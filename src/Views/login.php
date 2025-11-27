<h2>Acessar Conta</h2>
<form action="index.php" method="POST">
    <input type="hidden" name="tipo" value="login">

    <input type="email" name="email" placeholder="Seu E-mail" required><br>
    <input type="password" name="senha" placeholder="Sua Senha" required><br>

    <button type="submit" class="btn">ENTRAR</button>
</form>
<br>
<a href="index.php?pagina=cadastro">Não tem conta? Cadastre-se</a>