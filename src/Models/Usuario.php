<?php
// Arquivo: src/Models/Usuario.php

// AJUSTE AQUI: __DIR__ garante que ele pegue o arquivo na mesma pasta
require_once __DIR__ . '/Database.php';

class Usuario
{
    // ... (o resto continua igual)
    // Atributos
    private $id;
    private $nome;
    private $email;
    private $senha;

    // Variável para conexão com o banco
    private $conn;

    // Construtor
    public function __construct()
    {
        // Ao criar um Usuario, ele já se conecta ao banco automaticamente
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // --- GETTERS E SETTERS (Para preencher os dados) ---
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getEmail()
    {
        return $this->email;
    }


    // --- MÉTODOS QUE MEXEM NO BANCO (Antigo Repository) ---

    // Função para listar todos os usuários
    public function listarTodos()
    {
        $query = "SELECT id, nome, email FROM usuarios";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna um array direto (mais fácil)
    }

    // Função para salvar este usuário
    public function salvar()
    {
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':senha', $this->senha); // Lembre-se: em produção use hash!

        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId(); // Pega o ID que acabou de ser criado
            return true;
        }
        return false;
    }
}
?>