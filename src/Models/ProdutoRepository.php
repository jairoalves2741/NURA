<?php
// Arquivo: app/Model/ProdutoRepository.php
require_once 'Database.php'; // Requer a ÚNICA classe de conexão
require_once 'Produto.php';  // Entidade que ele gerencia

class ProdutoRepository
{
    private $conn;
    private $tabela = 'produtos'; // Assumindo o nome da tabela no MySQL

    public function __construct()
    {
        // 1. Obtém a conexão PDO
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Função 1: Buscar um Produto no BD pelo ID (SELECT)
    public function buscarPorId($id)
    {
        // SQL: O CÓDIGO SQL VIVE AQUI!
        $query = "SELECT id, nome, preco FROM {$this->tabela} WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($linha) {
            // Transforma a linha do banco em um objeto Produto
            return new Produto(
                $linha['id'],
                $linha['nome'],
                $linha['preco']
            );
        }
        return null; 
    }
    
    // Função 2: Buscar TODOS os Produtos (SELECT ALL)
    public function buscarTodos()
    {
        $query = "SELECT id, nome, preco FROM {$this->tabela}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $listaProdutos = [];
        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Transforma cada linha em um objeto Produto
            $listaProdutos[] = new Produto(
                $linha['id'],
                $linha['nome'],
                $linha['preco']
            );
        }
        return $listaProdutos; // Retorna um array de objetos Produto
    }
    
    // Função 3: Salvar um novo Produto no BD (INSERT)
    public function salvar(Produto $produto)
    {
        $query = "INSERT INTO {$this->tabela} (nome, preco) VALUES (:nome, :preco)";

        $stmt = $this->conn->prepare($query);

        // Binding: Previne SQL Injection!
        $stmt->bindParam(':nome', $produto->getNome());
        $stmt->bindParam(':preco', $produto->getPreco());

        return $stmt->execute(); 
    }
}
?>