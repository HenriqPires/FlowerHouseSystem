<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Cadastrar Fornecedor</h2>
    </x-slot>

    <div class="container mt-4">
        <form action="{{ route('fornecedores.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Contato</label>
                <input type="text" name="contato" class="form-control" value="{{ old('contato') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">CNPJ</label>
                <input type="text" name="cnpj" class="form-control" value="{{ old('cnpj') }}">
            </div>

            <button class="btn btn-primary">Salvar</button>
        </form>
    </div>
</x-app-layout>
