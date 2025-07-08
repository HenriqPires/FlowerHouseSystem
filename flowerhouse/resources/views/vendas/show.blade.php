<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-success">Detalhes da Venda #{{ $venda->id }}</h2>
    </x-slot>

    <div class="container mt-4">
        <p><strong>Funcionário:</strong> {{ $venda->funcionario->name ?? '-' }}</p>
        <p><strong>Data:</strong> {{ $venda->data }}</p>
        <p><strong>Total:</strong> R$ {{ number_format($venda->total, 2, ',', '.') }}</p>

        <h4 class="mt-4">Produtos</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venda->produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->pivot->quantidade }}</td>
                        <td>R$ {{ number_format($produto->pivot->preco_unitario, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($produto->pivot->quantidade * $produto->pivot->preco_unitario, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('vendas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</x-app-layout>
