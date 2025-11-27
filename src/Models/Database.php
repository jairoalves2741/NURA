<?php
class Database
{
    public function getConnection()
    {
        try {
            // Conecta ao MySQL (banco nura, usuario root, sem senha)
            $conn = new PDO("mysql:host=localhost;dbname=nura", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
            return null;
        }
    }
}
?>