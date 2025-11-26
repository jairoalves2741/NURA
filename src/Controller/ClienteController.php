<?php
// Arquivo: app/Controller/ClienteController.php
require_once __DIR__ . '/../Model/ClienteRepository.php';

class ClienteController
{
    private $clienteRepository;

    public function __construct()
    {
        // O Controller instancia e usa o Repositório
        $this->clienteRepository = new ClienteRepository();
    }

    public function exibirCliente($clienteId)
    {
        // 1. Controller pede os dados ao Repositório (Model)
        $cliente = $this->clienteRepository->buscarPorId($clienteId); 

        if ($cliente) {
            // 2. Controller passa o objeto Cliente para a View
            // Simulação da View (na prática, você faria um 'require_once' da View)
            echo "<h1>Detalhes do Cliente</h1>";
            echo "<p>Nome: {$cliente->getNome()}</p>";
            echo "<p>Email: {$cliente->getEmail()}</p>";
            echo "<p>Endereço: {$cliente->getEndereco()}</p>";
            echo "<p>Telefone: {$cliente->getTelefone()}</p>";
            
        } else {
            // 3. Controller decide a View de erro
            echo "Cliente não encontrado.";
        }
    }
    
    // Exemplo de como salvar um novo cliente
    public function cadastrarNovoCliente($dadosDoFormulario)
    {
        // Validação básica do Controller
        if (empty($dadosDoFormulario['nome']) || empty($dadosDoFormulario['email'])) {
            return "Erro: Nome e email são obrigatórios.";
        }

        // Cria a Entidade Cliente (o objeto de dados)
        $novoCliente = new Cliente(
            null, // ID nulo para novo registro
            $dadosDoFormulario['nome'],
            $dadosDoFormulario['email'],
            $dadosDoFormulario['senha'], // Senha deve ser hashed na vida real!
            $dadosDoFormulario['endereco'],
            $dadosDoFormulario['telefone']
        );
        
        // Controller pede ao Repositório para salvar
        if ($this->clienteRepository->salvar($novoCliente)) {
            // Controller chama a View de sucesso
            return "Cliente cadastrado com sucesso!";
        } else {
            // Controller chama a View de erro de banco de dados
            return "Erro ao salvar cliente no banco de dados.";
        }
    }
}
?>