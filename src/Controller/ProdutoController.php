<?php
// Arquivo: app/Controller/ProdutoController.php
require_once __DIR__ . '/../Model/ProdutoRepository.php';

class ProdutoController
{
    private $produtoRepository;

    public function __construct()
    {
        // O Controller instancia e usa o Repositório do Model
        $this->produtoRepository = new ProdutoRepository();
    }

    public function listarProdutos()
    {
        // 1. Controller pede a lista de objetos ao Repositório (Model)
        $produtos = $this->produtoRepository->buscarTodos();

        // 2. Controller decide qual View usar e passa os dados
        // Simulação da View (o arquivo View usaria $produtos para montar o HTML)
        echo "<h1>Lista de Produtos</h1>";

        if (empty($produtos)) {
            echo "<p>Nenhum produto cadastrado.</p>";
            return;
        }

        echo "<ul>";
        foreach ($produtos as $produto) {
            // A View acessa os dados usando os Getters:
            echo "<li>ID: {$produto->getId()} - Nome: {$produto->getNome()} - Preço: R$ {$produto->getPreco()}</li>";
        }
        echo "</ul>";

        // Na prática, você incluiria um arquivo da View aqui:
        // require_once __DIR__ . '/../View/produto/lista_produtos.php'; 
    }

    public function cadastrarProduto($dadosDoFormulario)
    {
        // Controller recebe os dados, valida e cria o objeto Entidade
        $novoProduto = new Produto(
            null, // ID nulo para novo registro
            $dadosDoFormulario['nome'],
            $dadosDoFormulario['preco']
        );

        // Controller pede ao Repositório para salvar
        if ($this->produtoRepository->salvar($novoProduto)) {
            // Agora podemos usar o ID gerado para a mensagem de sucesso!
            return "Produto '{$novoProduto->getNome()}' cadastrado com sucesso! ID: {$novoProduto->getId()}";

            // Na prática, você redirecionaria para a página de detalhes:
            // header("Location: /produto/{$novoProduto->getId()}");

        } else {
            return "Erro ao salvar o produto no banco de dados.";
        }
    }
}
?>