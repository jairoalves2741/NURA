<?php
// Arquivo: app/Model/PedidoRepository.php
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Pedido.php';
require_once __DIR__ . '/ClienteRepository.php';
class PedidoRepository
{
    private $conn;
    private $tabela = 'pedidos'; // Assumindo a tabela no MySQL
    private $clienteRepository;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->clienteRepository = new ClienteRepository(); // Instancia o repo de Cliente
    }

    // Função 1: Buscar um Pedido no BD pelo ID (SELECT)
    public function buscarPorId($id)
    {
        // SQL: busca apenas os dados do pedido. O ID do cliente é necessário (cliente_id).
        $query = "SELECT id, valorTotal, cliente_id FROM {$this->tabela} WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($linha) {
            // Passo 1: Busca o objeto Cliente usando o ID encontrado na linha do Pedido
            $cliente = $this->clienteRepository->buscarPorId($linha['cliente_id']);

            // Passo 2: Transforma a linha e o objeto Cliente em um objeto Pedido
            return new Pedido(
                $linha['id'],
                $linha['valorTotal'],
                $cliente // Injeda o objeto Cliente completo aqui
            );
        }
        return null;
    }

    // Função 2: Salvar um novo Pedido no BD (INSERT)
    public function salvar(Pedido $pedido)
    {
        // Note que salvamos apenas o ID do cliente na tabela de pedidos
        $clienteId = $pedido->getCliente()->getId();

        $query = "INSERT INTO {$this->tabela} (valorTotal, cliente_id) 
                  VALUES (:valorTotal, :cliente_id)";

        $stmt = $this->conn->prepare($query);

        // Binding
        $stmt->bindParam(':valorTotal', $pedido->getValorTotal());
        $stmt->bindParam(':cliente_id', $clienteId);

        return $stmt->execute();
    }
}
?>