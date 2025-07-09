<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="text-start">
                <div class="text-muted">Painel de controle do Entregador</div>
            </div>
            <div class="text-end">
                <img src="{{ asset('images/floricultura_logo.png') }}" alt="Logo Floricultura" style="height: 80px;">
            </div>
        </div>
        <hr style="border: 2px solid #b185db; border-radius: 5px;">
    </x-slot>

    <div class="container mt-4">

        <div class="alert text-center shadow-sm rounded-3"
             style="background-color: #e6f7ec; color: #2e6f4c; border-left: 6px solid #77c490;">
            🚚 Bem-vindo, <strong>{{ Auth::user()->name }}</strong> (Entregador)!
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4">

            <div class="col">
                <div class="card shadow-lg border-muted border-3">
                    <div class="card-body text-center">
                        <h5 class="card-title text-dark"><i class="bi bi-box2-heart-fill"></i> Minhas Entregas</h5>
                        <p class="card-text">Visualize, confirme e acompanhe as suas entregas.</p>
                        <a href="{{ route('entregas.index') }}" class="btn btn-outline-dark w-100">📦 Acessar Entregas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
