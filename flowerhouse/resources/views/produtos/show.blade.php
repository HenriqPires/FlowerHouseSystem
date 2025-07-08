<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Detalhes do Produto
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $produto->nome }}</p>
                <p><strong>Descrição:</strong> {{ $produto->descricao }}</p>
                <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                <p><strong>Estoque:</strong> {{ $produto->quantidade_estoque }}</p>
                <p><strong>Fornecedor:</strong> {{ $produto->fornecedor->nome }}</p>
            </div>
        </div>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</x-app-layout>
