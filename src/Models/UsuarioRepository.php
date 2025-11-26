<?php
// Arquivo: UsuarioRepository.php (A camada que executa o SQL)
require_once 'Database.php';
require_once 'Usuario.php';

class UsuarioRepository
{
    private $conn;
    private $tabela = 'usuarios';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection(); // Obtém a conexão PDO
    }

    // Função 1: Buscar um Usuário no BD pelo ID
    public function buscarPorId($id)
    {
        // 1. O CÓDIGO SQL VIVE AQUI!
        $query = "SELECT id, nome, email, senha FROM {$this->tabela} WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($linha) {
            // 2. Transforma a linha do banco em um objeto PHP (Entidade)
            return new Usuario(
                $linha['id'],
                $linha['nome'],
                $linha['email'],
                $linha['senha']
            );
        }
        return null; // Retorna null se não encontrar
    }

    // Função 2: Salvar (INSERT ou UPDATE) um Usuário no BD
    public function salvar(Usuario $usuario)
    {
        // Simplificação: vamos fazer apenas o INSERT para o exemplo
        $query = "INSERT INTO {$this->tabela} (nome, email, senha) VALUES (:nome, :email, :senha)";

        $stmt = $this->conn->prepare($query);

        // Binding: Previne SQL Injection! (Obrigatório para segurança)
        $stmt->bindParam(':nome', $usuario->getNome());
        $stmt->bindParam(':email', $usuario->getEmail());
        $stmt->bindParam(':senha', $usuario->getSenha());

        $resultado = $stmt->execute();

        if ($resultado) {
            // NOVO: Pega o ID gerado pelo banco de dados (auto-incremento)
            $lastId = $this->conn->lastInsertId();
            // NOVO: Define o ID de volta no objeto Entidade
            $usuario->setId($lastId);
            return true;
        }
        return false;
    }
}
?>