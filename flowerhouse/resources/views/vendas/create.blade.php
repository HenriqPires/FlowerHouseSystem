<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-center text-success">
            {{ __('Registrar Nova Venda') }}
        </h2>
    </x-slot>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erro:</strong> Corrija os problemas abaixo:
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('vendas.store') }}">
            @csrf

            <div id="produtos-wrapper">
                <div class="row produto-item mb-3">
                    <div class="col-md-6">
                        <label for="produto_id_0" class="form-label">Produto</label>
                        <select name="produtos[0][produto_id]" id="produto_id_0" class="form-select" required>
                            <option value="">-- Selecione --</option>
                            @foreach($produtos as $produto)
                                <option value="{{ $produto->id }}">{{ $produto->nome }} - R$ {{ number_format($produto->preco, 2, ',', '.') }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="quantidade_0" class="form-label">Quantidade</label>
                        <input type="number" name="produtos[0][quantidade]" id="quantidade_0" class="form-control" min="1" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-remove w-100">Remover</button>
                    </div>
                </div>
            </div>

            <button type="button" id="add-produto" class="btn btn-outline-primary mb-3">+ Adicionar Produto</button>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Salvar Venda</button>
                <a href="{{ route('vendas.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <script>
        let index = 1;

        document.getElementById('add-produto').addEventListener('click', () => {
            const wrapper = document.getElementById('produtos-wrapper');

            const div = document.createElement('div');
            div.className = 'row produto-item mb-3';
            div.innerHTML = `
                <div class="col-md-6">
                    <label for="produto_id_${index}" class="form-label">Produto</label>
                    <select name="produtos[${index}][produto_id]" id="produto_id_${index}" class="form-select" required>
                        <option value="">-- Selecione --</option>
                        @foreach($produtos as $produto)
                            <option value="{{ $produto->id }}">{{ $produto->nome }} - R$ {{ number_format($produto->preco, 2, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="quantidade_${index}" class="form-label">Quantidade</label>
                    <input type="number" name="produtos[${index}][quantidade]" id="quantidade_${index}" class="form-control" min="1" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-remove w-100">Remover</button>
                </div>
            `;

            wrapper.appendChild(div);
            index++;
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('btn-remove')) {
                e.target.closest('.produto-item').remove();
            }
        });
    </script>
</x-app-layout>
