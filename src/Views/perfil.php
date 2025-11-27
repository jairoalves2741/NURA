<h2>Meu Perfil</h2>
<div style="background: #eee; padding: 20px; border-radius: 10px; display: inline-block;">
    <p><strong>Nome:</strong> <?php echo $_SESSION['user_nome']; ?></p>
    <p><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?></p>
    <hr style="border: 0; border-top: 1px solid #ccc; margin: 20px 0;">

    <a href="index.php?sair=true" class="btn">SAIR DA CONTA</a>

    <br><br>

    <div style="margin-top: 20px; padding-top: 20px; border-top: 1px dashed #999;">
        <p style="font-size: 0.9rem; color: #555;">Zona de Perigo:</p>
        <a href="index.php?acao=deletar_conta" class="btn btn-danger" style="background-color: #d9534f;">
            EXCLUIR MINHA CONTA
        </a>
    </di        v>
</div>