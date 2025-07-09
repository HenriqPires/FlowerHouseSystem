<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Lista de Fornecedores</h2>
    </x-slot>

    <div class="container mt-4">
        <a href="{{ route('fornecedores.create') }}" class="btn btn-success mb-3">Novo Fornecedor</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Contato</th>
                    <th>CNPJ</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <td>{{ $fornecedor->nome }}</td>
                        <td>{{ $fornecedor->contato }}</td>
                        <td>{{ $fornecedor->cnpj }}</td>
                        <td>
                            <a href="{{ route('fornecedores.edit', $fornecedor) }}" class="btn btn-warning btn-sm">Editar</a>
                            <a href="{{ route('fornecedores.show', $fornecedor) }}" class="btn btn-info btn-sm">Ver</a>
                            <form action="{{ route('fornecedores.destroy', $fornecedor) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <a href="{{ route(auth()->user()->tipo === 'admin' ? 'dashboard' : (auth()->user()->tipo === 'funcionario' ? 'dashboard-funcionario' : 'dashboard-entregador')) }}" class="btn btn-secondary mb-3">
                                Voltar
                                 </a>  
            </tbody>
        </table>
    </div>
</x-app-layout>
