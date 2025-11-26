<?php
// Arquivo: app/Model/Pedido.php
// Não precisa de 'require_once' para Cliente aqui, pois a injeção
// da classe Cliente será feita no Controller/Repository.

class Pedido
{
    private $id;
    private $valorTotal;
    private $cliente; // Objeto da classe Cliente

    public function __construct($id, $valorTotal, Cliente $cliente)
    {
        $this->id = $id;
        $this->valorTotal = $valorTotal;
        $this->cliente = $cliente; // Recebe um objeto Cliente já pronto
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    // Setter
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

    // ATENÇÃO: O método ExibirInfo() foi removido.
    // A View usará os getters para montar o HTML.
}
?>