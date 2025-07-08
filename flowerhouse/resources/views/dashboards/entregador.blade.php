<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-success">Dashboard do Entregador</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="alert alert-success">Bem-vindo, {{ Auth::user()->name }} (Entregador)!</div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <a href="{{ route('entregas.index') }}" class="btn btn-outline-dark btn-lg w-100">📦 Minhas Entregas</a>
            </div>
        </div>
    </div>
</x-app-layout>
