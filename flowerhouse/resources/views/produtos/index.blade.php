<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Lista de Produtos</h2>
    </x-slot>

    <div class="container mt-4">
        <a href="{{ route('produtos.create') }}" class="btn btn-success mb-3">Novo Produto</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Fornecedor</th>
                    <th>Estoque</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td class="text-center" style="width: 100px;">
                            @if ($produto->imagem)
                                <img src="{{ asset('storage/' . $produto->imagem) }}"
                                     alt="Imagem do Produto"
                                     style="max-width: 70px; max-height: 70px; object-fit: cover; border-radius: 8px;">
                            @else
                                <span class="text-muted">Sem imagem</span>
                            @endif
                        </td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->fornecedor->nome }}</td>
                        <td>{{ $produto->quantidade_estoque }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('produtos.show', $produto) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
