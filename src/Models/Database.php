<?php
// Arquivo: Database.php (Toda a lógica do banco começa aqui)
class Database
{
    private $host = 'localhost';
    private $db_name = 'nome_do_seu_banco';
    private $username = 'root'; // Geralmente 'root' para testes locais
    private $password = '';     // Geralmente vazio para testes locais

    public function getConnection()
    {
        try {
            // Cria um novo objeto PDO (PHP Data Objects) para conectar ao MySQL
            $conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );

            // Configura o PDO para relatar erros para facilitar a depuração
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch (PDOException $e) {
            // Se falhar, mostra o erro (em produção, você registraria o erro, não mostraria)
            die("Erro de Conexão com o Banco de Dados: " . $e->getMessage());
        }
    }
}
?>