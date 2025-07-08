<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Detalhes da Entrega</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <p><strong>Venda:</strong> #{{ $entrega->venda_id }}</p>
                <p><strong>Entregador:</strong> {{ $entrega->entregador->name }}</p>
                <p><strong>Status:</strong>
                    <span class="badge bg-{{ $entrega->status === 'entregue' ? 'success' : ($entrega->status === 'problema' ? 'danger' : 'secondary') }}">
                        {{ ucfirst($entrega->status) }}
                    </span>
                </p>
                <p><strong>Data Entrega:</strong> {{ $entrega->data_entrega ? \Carbon\Carbon::parse($entrega->data_entrega)->format('d/m/Y H:i') : '-' }}</p>
                <p><strong>Observações:</strong><br>
                    {!! nl2br(e($entrega->observacoes)) !!}
                </p>
            </div>
        </div>

        <div class="mt-3">
            @if (auth()->user()->tipo === 'entregador' && $entrega->status === 'pendente')
                <form method="POST" action="{{ route('entregas.confirmar', $entrega) }}" class="d-inline">
                    @csrf
                    <button class="btn btn-success">Confirmar Entrega</button>
                </form>

                <a href="{{ route('entregas.problema.form', $entrega) }}" class="btn btn-danger">Relatar Problema</a>

            @endif

            <a href="{{ route('entregas.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</x-app-layout>
