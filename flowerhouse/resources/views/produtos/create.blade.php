<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-primary">Adicionar Novo Produto</h2>
    </x-slot>

    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fornecedor_id" class="form-label">Fornecedor</label>
                <select class="form-select" name="fornecedor_id" required>
                    <option value="">Selecione...</option>
                    @foreach ($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço (R$)</label>
                <input type="number" step="0.01" name="preco" id="preco" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="quantidade_estoque" class="form-label">Quantidade em Estoque</label>
                <input type="number" name="quantidade_estoque" id="quantidade_estoque" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Imagem do Produto</label>
                <input type="file" name="imagem" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success">Salvar Produto</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>         
        </form>
    </div>
</x-app-layout>
