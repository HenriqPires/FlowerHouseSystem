<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Editar Entrega</h2>
    </x-slot>

    <div class="container mt-4">
        <form action="{{ route('entregas.update', $entrega) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Venda</label>
                <select name="venda_id" class="form-control" required>
                    @foreach ($vendas as $venda)
                        <option value="{{ $venda->id }}" {{ $entrega->venda_id == $venda->id ? 'selected' : '' }}>
                            #{{ $venda->id }} - R$ {{ number_format($venda->total, 2, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Entregador</label>
                <select name="entregador_id" class="form-control" required>
                    @foreach ($entregadores as $user)
                        <option value="{{ $user->id }}" {{ $entrega->entregador_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    @foreach (['pendente', 'entregue', 'problema'] as $status)
                        <option value="{{ $status }}" {{ $entrega->status == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Data da Entrega</label>
                <input type="datetime-local" name="data_entrega" class="form-control"
                       value="{{ $entrega->data_entrega ? \Carbon\Carbon::parse($entrega->data_entrega)->format('Y-m-d\TH:i') : '' }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Observações</label>
                <textarea name="observacoes" class="form-control">{{ $entrega->observacoes }}</textarea>
            </div>

            <button class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</x-app-layout>
