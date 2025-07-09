<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="text-start">
                <div class="text-muted">Painel de controle da Floricultura</div>
            </div>
            <div class="text-end">
                <img src="{{ asset('images/floricultura_logo.png') }}" alt="Logo Floricultura" style="height: 80px;">
            </div>
        </div>
        <hr style="border: 2px solid #b185db; border-radius: 5px;">
    </x-slot>

    <div class="container mt-4">

        <div class="alert text-center shadow-sm rounded-3"
             style="background-color: #f4ecfa; color: #5a426f; border-left: 6px solid #b185db;">
            🌷 Bem-vindo, <strong>{{ Auth::user()->name }}</strong> (Administrador)!
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4">

            <div class="col">
                <div class="card shadow-lg border-muted border-3">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary"><i class="bi bi-box-seam"></i> Produtos</h5>
                        <p class="card-text">Gerencie os produtos da floricultura.</p>
                        <a href="{{ route('produtos.index') }}" class="btn btn-outline-primary w-100">🛒 Gerenciar Produtos</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg border-muted border-3">
                    <div class="card-body text-center">
                        <h5 class="card-title text-secondary"><i class="bi bi-truck"></i> Fornecedores</h5>
                        <p class="card-text">Controle seus fornecedores.</p>
                        <a href="{{ route('fornecedores.index') }}" class="btn btn-outline-secondary w-100">🚚 Gerenciar Fornecedores</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg border-muted border-3">
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">💳 Vendas</h5>
                        <p class="card-text">Registre e visualize histórico de vendas.</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('vendas.index') }}" class="btn btn-outline-success">
                                📊 Histórico de Vendas
                            </a>
                            <a href="{{ route('vendas.create') }}" class="btn btn-success">
                                💸 Realizar Venda
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg border-muted border-3">
                    <div class="card-body text-center">
                        <h5 class="card-title text-warning"><i class="bi bi-box2-heart"></i> Entregas</h5>
                        <p class="card-text">Crie e acompanhe as entregas.</p>
                        <a href="{{ route('entregas.index') }}" class="btn btn-outline-warning w-100">📦 Gerenciar Entregas</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
