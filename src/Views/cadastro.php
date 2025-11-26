<!DOCTYPE html>
<html>

<head>
    <title>Cadastro - Nura</title>
</head>

<body>

    <h1>Criar Nova Conta</h1>

    <form action="index.php" method="POST">
        Nome: <br>
        <input type="text" name="nome" required><br><br>

        Email: <br>
        <input type="email" name="email" required><br><br>

        Senha: <br>
        <input type="password" name="senha" required><br><br>

        <button type="submit">SALVAR USUÁRIO</button>
    </form>

    <br>
    <a href="index.php?pagina=home">Voltar para Home</a>

</body>

</html>