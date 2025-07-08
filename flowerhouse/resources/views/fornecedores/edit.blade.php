<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Editar Fornecedor</h2>
    </x-slot>

    <div class="container mt-4">
        <form action="{{ route('fornecedores.update', $fornecedor) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $fornecedor->nome) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Contato</label>
                <input type="text" name="contato" class="form-control" value="{{ old('contato', $fornecedor->contato) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">CNPJ</label>
                <input type="text" name="cnpj" class="form-control" value="{{ old('cnpj', $fornecedor->cnpj) }}">
            </div>

            <button class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</x-app-layout>
