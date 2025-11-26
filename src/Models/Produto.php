<?php
// Arquivo: app/Model/Produto.php

class Produto
{
    private $id;
    private $nome;
    private $preco;

    public function __construct($id, $nome, $preco)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
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

    public function getPreco()
    {
        return $this->preco;
    }

    // Setters
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    // ATENÇÃO: Os métodos ExibirInfo() e ListaProdutos() foram removidos.
    // A View usará os getters (ex: getNome()) para montar o HTML.
}
?>