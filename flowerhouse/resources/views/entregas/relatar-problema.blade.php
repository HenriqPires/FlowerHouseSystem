<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Relatar Problema - Entrega #{{ $entrega->id }}</h2>
    </x-slot>

    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erro:</strong> Corrija os campos abaixo:
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('entregas.problema', $entrega) }}">
            @csrf

            <div class="mb-3">
                <label for="observacoes" class="form-label">Descreva o problema ocorrido:</label>
                <textarea name="observacoes" id="observacoes" class="form-control" rows="4">{{ old('observacoes') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Sugestões rápidas:</label><br>
                @foreach ($sugestoes as $texto)
                    <button type="button" class="btn btn-outline-secondary btn-sm me-1 mb-2"
                        onclick="document.getElementById('observacoes').value = '{{ $texto }}'">
                        {{ $texto }}
                    </button>
                @endforeach
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger">Enviar Relato</button>
                <a href="{{ route('entregas.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
