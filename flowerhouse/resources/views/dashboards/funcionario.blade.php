<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-info">Dashboard do Funcionário</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="alert alert-info">Bem-vindo, {{ Auth::user()->name }} (Funcionário)!</div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <a href="{{ route('produtos.index') }}" class="btn btn-outline-primary btn-lg w-100">🛒 Visualizar Produtos</a>
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ route('vendas.index') }}" class="btn btn-outline-success btn-lg w-100">💳 Realizar Venda</a>
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ route('entregas.index') }}" class="btn btn-outline-warning btn-lg w-100">📦 Criar Entrega</a>
            </div>
        </div>
    </div>
</x-app-layout>
