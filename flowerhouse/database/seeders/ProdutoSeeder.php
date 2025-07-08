<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        Produto::create([
            'nome' => 'Buquê de Rosas',
            'descricao' => 'Buquê com 12 rosas vermelhas',
            'preco' => 79.90,
            'quantidade_estoque' => 10,
            'fornecedor_id' => 1,
        ]);

        Produto::create([
            'nome' => 'Orquídea Branca',
            'descricao' => 'Orquídea em vaso decorado',
            'preco' => 59.90,
            'quantidade_estoque' => 8,
            'fornecedor_id' => 2,
        ]);
    }
}
