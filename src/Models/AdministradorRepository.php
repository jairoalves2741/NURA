<?php
// Arquivo: app/Model/AdministradorRepository.php
require_once 'Database.php';      // Requer a ÚNICA classe de conexão
require_once 'Administrador.php';  // Requer a Entidade que ele gerencia

class AdministradorRepository
{
    private $conn;
    private $tabela = 'administradores'; // Assumindo o nome da tabela no MySQL

    public function __construct()
    {
        // 1. O Repositório obtém a conexão da classe Database
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // EXIBIÇÃO: Busca um administrador no BD usando o ID
    public function buscarPorId($id)
    {
        // O CÓDIGO SQL VIVE AQUI!
        // :id é um placeholder (consulta preparada) para segurança
        $query = "SELECT id, nome, email, senha, nivelAcesso FROM {$this->tabela} WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($linha) {
            // Transforma a linha do banco em um objeto Administrador
            return new Administrador(
                $linha['id'],
                $linha['nome'],
                $linha['email'],
                $linha['senha'],
                $linha['nivelAcesso']
            );
        }
        return null; // Retorna null se não encontrar
    }

    // INSERÇÃO: Salva um novo objeto Administrador no BD
    public function salvar(Administrador $admin)
    {
        $query = "INSERT INTO {$this->tabela} (nome, email, senha, nivelAcesso) 
                  VALUES (:nome, :email, :senha, :nivelAcesso)";

        $stmt = $this->conn->prepare($query);

        // Binding: Liga os valores do objeto aos placeholders SQL
        $stmt->bindParam(':nome', $admin->getNome());
        $stmt->bindParam(':email', $admin->getEmail());
        $stmt->bindParam(':senha', $admin->getSenha());
        $stmt->bindParam(':nivelAcesso', $admin->getNivelAcesso());

        return $stmt->execute(); // Retorna true ou false
    }
}
?>