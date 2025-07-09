<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-primary">Editar Produto</h2>
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

        <form method="POST" action="{{ route('produtos.update', $produto->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $produto->nome }}" required>
            </div>

            <div class="mb-3">
                 <label for="fornecedor_id" class="form-label">Fornecedor</label>
                    <select class="form-select" name="fornecedor_id" required>
                        <option value="">Selecione...</option>
                    @foreach ($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}" {{ $produto->fornecedor_id == $fornecedor->id ? 'selected' : '' }}>
                            {{ $fornecedor->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="3">{{ $produto->descricao }}</textarea>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço (R$)</label>
                <input type="number" step="0.01" name="preco" id="preco" class="form-control" value="{{ $produto->preco }}" required>
            </div>

            <div class="mb-3">
                <label for="quantidade_estoque" class="form-label">Quantidade em Estoque</label>
                <input type="number" name="quantidade_estoque" id="quantidade_estoque" class="form-control" value="{{ $produto->quantidade_estoque }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Imagem do Produto</label>
                <input type="file" name="imagem" class="form-control" accept="image/*">
                @if ($produto->imagem)
                    <img src="{{ asset('storage/' . $produto->imagem) }}" width="120" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Produto</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>

            
        </form>
    </div>
</x-app-layout>
