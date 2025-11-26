<?php
require_once __DIR__ . '/../Models/Usuario.php';

class UsuarioController
{
    // ... resto do código igual ...

    public function listar()
    {
        // Cria o modelo
        $usuarioModel = new Usuario();

        // Pede para o modelo buscar os dados
        $lista = $usuarioModel->listarTodos();

        // Retorna os dados (aqui seria onde você manda para a View ou JSON)
        return $lista;
    }

    public function criarNovo($nome, $email, $senha)
    {
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        if ($usuario->salvar()) {
            return "Usuário salvo com sucesso! ID: " . $usuario->getId();
        } else {
            return "Erro ao salvar.";
        }
    }
}
?>