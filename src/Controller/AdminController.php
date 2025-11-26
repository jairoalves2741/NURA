<?php
// Arquivo: app/Controller/AdminController.php
require_once __DIR__ . '/../Model/AdministradorRepository.php';

class AdminController
{
    private $adminRepository; // 1. Declara a variável de Repositório

    public function __construct()
    {
        // 2. Instancia o Repositório apenas uma vez
        $this->adminRepository = new AdministradorRepository();
    }

    public function exibirAdmin($adminId)
    {
        // 3. Usa a variável já instanciada
        $admin = $this->adminRepository->buscarPorId($adminId);

        if ($admin) {
            // ... restante do código (chamar View)
            echo "Admin encontrado! Nome: " . $admin->getNome() . ", Nível: " . $admin->getNivelAcesso();
        } else {
            echo "Admin não encontrado.";
        }
    }
}
?>