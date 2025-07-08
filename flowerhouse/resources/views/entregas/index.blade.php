<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Entregas</h2>
    </x-slot>

    <div class="container mt-4">

        {{-- Apenas Admins e Funcionários podem ver o botão --}}
        @if(auth()->user()->tipo !== 'entregador')
            <a href="{{ route('entregas.create') }}" class="btn btn-success mb-3">Nova Entrega</a>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

    

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Venda</th>
                    <th>Entregador</th>
                    <th>Status</th>
                    <th>Data Entrega</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entregas as $entrega)
                    <tr>
                        <td>#{{ $entrega->venda_id }}</td>
                        <td>{{ $entrega->entregador->name }}</td>
                        <td>
                            <span class="badge bg-{{ $entrega->status === 'entregue' ? 'success' : ($entrega->status === 'problema' ? 'danger' : 'secondary') }}">
                                {{ ucfirst($entrega->status) }}
                            </span>
                        </td>
                        <td>
                            {{ $entrega->data_entrega ? \Carbon\Carbon::parse($entrega->data_entrega)->format('d/m/Y H:i') : '-' }}
                        </td>
                        <td>
                            <a href="{{ route('entregas.show', $entrega) }}" class="btn btn-info btn-sm">Ver</a>

                            @if(auth()->user()->tipo !== 'entregador')
                                <a href="{{ route('entregas.edit', $entrega) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('entregas.destroy', $entrega) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir entrega?')">Excluir</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
