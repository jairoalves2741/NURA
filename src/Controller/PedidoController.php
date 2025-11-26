<?php
// Arquivo: app/Controller/PedidoController.php
require_once __DIR__ . '/../Model/PedidoRepository.php';

class PedidoController
{
    private $pedidoRepository;

    public function __construct()
    {
        // O Controller instancia o Repositório de Pedido
        $this->pedidoRepository = new PedidoRepository();
    }

    public function exibirPedido($pedidoId)
    {
        // 1. Controller pede o objeto Pedido completo ao Repositório (Model)
        $pedido = $this->pedidoRepository->buscarPorId($pedidoId);

        if ($pedido) {
            // 2. Controller passa o objeto para a View
            // Simulação da View (o arquivo View usaria $pedido para montar o HTML)
            echo "<h1>Detalhes do Pedido #{$pedido->getId()}</h1>";
            echo "<p>Valor Total: {$pedido->getValorTotal()}</p>";

            // Acessando o objeto Cliente que está dentro do Pedido
            $cliente = $pedido->getCliente();
            echo "<h3>Informações do Cliente</h3>";
            echo "<p>Nome do Cliente: {$cliente->getNome()}</p>";
            echo "<p>Email do Cliente: {$cliente->getEmail()}</p>";

        } else {
            // 3. Controller decide a View de erro
            echo "Pedido não encontrado.";
        }
    }
}
?>