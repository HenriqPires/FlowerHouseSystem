<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Vendas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 22px;
            color: #333;
        }

        .venda-box {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 6px;
        }

        .venda-header {
            font-weight: bold;
            margin-bottom: 10px;
            color: #444;
        }

        .venda-info {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            color: #000;
            text-align: left;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>Relatório de Vendas</h1>

    @foreach ($vendas as $venda)
        <div class="venda-box">
            <div class="venda-header">Venda #{{ $venda->id }}</div>
            <div class="venda-info">
                <strong>Funcionário:</strong> {{ $venda->funcionario->name ?? '---' }}<br>
                <strong>Data:</strong> {{ $venda->data }}<br>
                <strong>Total da Venda:</strong> R$ {{ number_format($venda->total, 2, ',', '.') }}
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($venda->produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->pivot->quantidade }}</td>
                            <td>R$ {{ number_format($produto->pivot->preco_unitario, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($produto->pivot->quantidade * $produto->pivot->preco_unitario, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach

    <p class="total">
    Total de vendas registradas: {{ $vendas->count() }}<br>
    Valor total das vendas: <strong>R$ {{ number_format($totalGeral, 2, ',', '.') }}</strong>
    </p>


</body>
</html>
