<?php
class Database
{
    // --- AQUI ESTÁ O SEGREDO DO LINK ---
    private $host = 'localhost';

    // ATENÇÃO: Coloque exatamente o nome que criamos no Passo 1
    private $db_name = 'nura';

    // Usuário padrão do XAMPP/WAMP é 'root'
    private $username = 'root';

    // Senha padrão geralmente é vazia (aspas vazias)
    private $password = '';
    // -------------------------------------

    public function getConnection()
    {
        $conn = null;
        try {
            $conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }
        return $conn;
    }
}
?>