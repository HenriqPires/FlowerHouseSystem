<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-primary">Histórico de Vendas</h2>
    </x-slot>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- FILTRO POR DATA --}}
        @auth
            @if (auth()->user()->tipo === 'admin')
                <form method="GET" action="{{ route('vendas.relatorio.pdf') }}" class="row g-2 mb-3">
                    <div class="col-md-4">
                        <label for="data_inicio" class="form-label">Data Início</label>
                        <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="{{ request('data_inicio') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="data_fim" class="form-label">Data Fim</label>
                        <input type="date" name="data_fim" id="data_fim" class="form-control" value="{{ request('data_fim') }}">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-outline-secondary w-100">📄 Gerar Relatório PDF</button>
                    </div>
                </form>
            @endif
        @endauth

        <a href="{{ route('vendas.create') }}" class="btn btn-primary mb-3">+ Nova Venda</a>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Data</th>
                    <th>Funcionário</th>
                    <th>Total (R$)</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vendas as $venda)
                    <tr>
                        <td>{{ $venda->id }}</td>
                        <td>{{ $venda->data }}</td>
                        <td>{{ $venda->funcionario->name ?? '-' }}</td>
                        <td>{{ number_format($venda->total, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('vendas.show', $venda) }}" class="btn btn-sm btn-outline-info">Detalhes</a>
                            <form action="{{ route('vendas.destroy', $venda) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Deseja excluir esta venda?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nenhuma venda registrada.</td>
                    </tr>
                @endforelse

                <a href="{{ route(auth()->user()->tipo === 'admin' ? 'dashboard' : (auth()->user()->tipo === 'funcionario' ? 'dashboard-funcionario' : 'dashboard-entregador')) }}" class="btn btn-secondary mb-3">
                                Voltar
                                 </a>  
            </tbody>
        </table>
    </div>
</x-app-layout>
