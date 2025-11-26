<?php
// Arquivo: Usuario.php
class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha; // Deve ser sempre HASHED (criptografada) na vida real!

    public function __construct($id, $nome, $email, $senha)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    // Getters
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
    public function getSenha()
    {
        return $this->senha;
    }

    // Setters (mantidos para completude)
    public function setId($id)
    {
        $this->id = $id; // Isso é crucial para o Repositório funcionar corretamente
    }
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

    // ATENÇÃO: O método ExibirInfo() com 'echo' FOI REMOVIDO!
    // A View usará os Getters para montar o HTML.
}
?>