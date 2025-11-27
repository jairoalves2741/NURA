<?php
// Arquivo: src/Models/Usuario.php
require_once __DIR__ . '/Database.php';

class Usuario
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function cadastrar($nome, $email, $senha)
    {
        // Criptografa a senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senhaHash);

        
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            // Se o erro for de duplicidade (Código 23000), retorna falso
            if ($e->getCode() == '23000') {
                return false;
            } else {
                // Se for outro erro, mostra na tela
                echo "Erro no banco: " . $e->getMessage();
                return false;
            }
        }
        // -----------------------------
    }

    public function login($email, $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $dados = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($senha, $dados['senha'])) {
                return $dados;
            }
        }
        return false;
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
?>