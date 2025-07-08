<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Nova Entrega</h2>
    </x-slot>

    <div class="container mt-4">
        <form action="{{ route('entregas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Venda</label>
                <select name="venda_id" class="form-control" required>
                    @foreach ($vendas as $venda)
                        <option value="{{ $venda->id }}">#{{ $venda->id }} - R$ {{ number_format($venda->total, 2, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Entregador</label>
                <select name="entregador_id" class="form-control" required>
                    @foreach ($entregadores as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="pendente">Pendente</option>
                    <option value="entregue">Entregue</option>
                    <option value="problema">Problema</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Data da Entrega</label>
                <input type="datetime-local" name="data_entrega" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Observações</label>
                <textarea name="observacoes" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">Salvar</button>
        </form>
    </div>
</x-app-layout>
