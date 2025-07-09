<nav class="navbar navbar-expand-lg" style="background-color:rgb(182, 70, 210);">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            🌸 Floricultura System
        </a>

        <div class="d-flex align-items-center">
            <div class="me-3 text-dark fw-semibold">
                {{ Auth::user()->name }}
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-dark btn-sm">
                    Sair
                </button>
            </form>
        </div>
    </div>
</nav>
