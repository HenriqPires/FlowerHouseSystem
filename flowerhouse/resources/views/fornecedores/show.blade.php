<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Detalhes do Fornecedor</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $fornecedor->nome }}</p>
                <p><strong>Contato:</strong> {{ $fornecedor->contato }}</p>
                <p><strong>CNPJ:</strong> {{ $fornecedor->cnpj }}</p>
            </div>
        </div>
        <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</x-app-layout>
