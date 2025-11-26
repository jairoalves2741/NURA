<?php
// Arquivo: UsuarioController.php (A camada Controller)
require_once './Model/UsuarioRepository.php';

class UsuarioController
{
    private $usuarioRepository;

    public function __construct()
    {
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function listarUsuarios()
    {
        // O Controller chama o Repositório do Model
        $usuarios = $this->usuarioRepository->buscarTodos();

        // Agora o Controller pega a lista de objetos e a passa para a View

        // include './View/lista_usuarios_view.php'; // Exemplo de chamada da View

        // Aqui a View usaria um foreach para exibir $usuarios
        return $usuarios; // A View renderiza estes dados
    }
}
?>