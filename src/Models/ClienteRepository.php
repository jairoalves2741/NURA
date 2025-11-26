<?php
// Arquivo: app/Model/ClienteRepository.php
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Cliente.php';

class ClienteRepository
{
    private $conn;
    private $tabela = 'clientes'; // Assumindo o nome da tabela no MySQL

    public function __construct()
    {
        // Obtém a conexão PDO do arquivo Database.php
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Função 1: Buscar um Cliente no BD pelo ID (SELECT)
    public function buscarPorId($id)
    {
        // O CÓDIGO SQL VIVE AQUI!
        $query = "SELECT id, nome, email, senha, endereco, telefone FROM {$this->tabela} WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($linha) {
            // Transforma a linha do banco em um objeto Cliente
            return new Cliente(
                $linha['id'],
                $linha['nome'],
                $linha['email'],
                $linha['senha'],
                $linha['endereco'],
                $linha['telefone']
            );
        }
        return null;
    }

    // Função 2: Salvar um novo Cliente no BD (INSERT)
    public function salvar(Cliente $cliente)
    {
        $query = "INSERT INTO {$this->tabela} (nome, email, senha, endereco, telefone) 
                  VALUES (:nome, :email, :senha, :endereco, :telefone)";

        $stmt = $this->conn->prepare($query);

        // Binding: Previne SQL Injection!
        $stmt->bindParam(':nome', $cliente->getNome());
        $stmt->bindParam(':email', $cliente->getEmail());
        $stmt->bindParam(':senha', $cliente->getSenha());
        $stmt->bindParam(':endereco', $cliente->getEndereco());
        $stmt->bindParam(':telefone', $cliente->getTelefone());

        return $stmt->execute();
    }
}
?>