<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-primary text-center">Dashboard do Administrador</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="alert alert-primary text-center">
            Bem-vindo, {{ Auth::user()->name }} (Admin)!
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4">

            <div class="col">
                <div class="card shadow border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="bi bi-box-seam"></i> Produtos</h5>
                        <p class="card-text">Gerencie os produtos da floricultura.</p>
                        <a href="{{ route('produtos.index') }}" class="btn btn-outline-primary w-100">🛒 Gerenciar Produtos</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="bi bi-truck"></i> Fornecedores</h5>
                        <p class="card-text">Controle seus fornecedores.</p>
                        <a href="{{ route('fornecedores.index') }}" class="btn btn-outline-secondary w-100">🚚 Gerenciar Fornecedores</a>
                    </div>
                </div>
            </div>

            <!-- Vendas -->
            <div class="col-md-6 mb-4">
                <div class="card border-success shadow-sm">
                     <div class="card-body text-center">
                            <h5 class="card-title">💸 Vendas</h5>
                            <p class="card-text">Acompanhe ou registre uma venda.</p>
                            <div class="d-grid gap-2">
                            <a href="{{ route('vendas.index') }}" class="btn btn-outline-success">
                                📊Histórico de Vendas
                            </a>
                            <a href="{{ route('vendas.create') }}" class="btn btn-success">
                                 ➕ Realizar Nova Venda
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="bi bi-box2-heart"></i> Entregas</h5>
                        <p class="card-text">Visualize e acompanhe as entregas.</p>
                        <a href="{{ route('entregas.index') }}" class="btn btn-outline-warning w-100">📦 Visualizar Entregas</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
