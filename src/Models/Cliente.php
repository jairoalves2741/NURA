<?php
// Arquivo: app/Model/Cliente.php
require_once __DIR__ . '/Usuario.php'; // Herda da classe base Usuario

class Cliente extends Usuario
{
    private $endereco;
    private $telefone;

    public function __construct($id, $nome, $email, $senha, $endereco, $telefone)
    {
        // Chama o construtor da classe pai (Usuario)
        parent::__construct($id, $nome, $email, $senha);
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }

    // Getters
    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    // Setters
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    // ATENÇÃO: O método ExibirInfo() foi removido.
    // A View usará os getters para montar o HTML.
}
?>