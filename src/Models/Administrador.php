<?php
// Arquivo: app/Model/Administrador.php
require_once __DIR__ . '/Usuario.php'; // Herda da classe base Usuario

class Administrador extends Usuario
{
    private $nivelAcesso;

    public function __construct($id, $nome, $email, $senha, $nivelAcesso)
    {
        // Chama o construtor da classe pai (Usuario)
        parent::__construct($id, $nome, $email, $senha);
        $this->nivelAcesso = $nivelAcesso;
    }

    // Getter
    public function getNivelAcesso()
    {
        return $this->nivelAcesso;
    }

    // Setter
    public function setNivelAcesso($nivelAcesso)
    {
        $this->nivelAcesso = $nivelAcesso;
    }

    // ATENÇÃO: O método ExibirInfo() foi removido.
    // A View usará getNivelAcesso() e os getters herdados do Usuario.
}
?>