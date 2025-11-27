<?php
require_once __DIR__ . '/../Models/Usuario.php';

class UsuarioController
{

    // Registrar (Cadastro)
    public function registrar($nome, $email, $senha)
    {
        $usuario = new Usuario();
        if ($usuario->cadastrar($nome, $email, $senha)) {
            return "Sucesso! Faça login.";
        }
        return "Erro: Email já existe.";
    }

    // Login
    public function autenticar($email, $senha)
    {
        $usuario = new Usuario();
        $dados = $usuario->login($email, $senha);

        if ($dados) {
            // AQUI ESTÁ A MUDANÇA: Salvamos o ID também!
            $_SESSION['user_id'] = $dados['id'];
            $_SESSION['user_nome'] = $dados['nome'];
            $_SESSION['user_email'] = $dados['email'];
            return true;
        }
        return false;
    }

    // NOVA FUNÇÃO: Excluir Conta
    public function deletarUsuario($id)
    {
        $usuario = new Usuario();
        return $usuario->excluir($id);
    }
}
?>