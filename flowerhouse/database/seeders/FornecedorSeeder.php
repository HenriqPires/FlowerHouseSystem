<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    public function run(): void
    {
    Fornecedor::firstOrCreate(
        ['cnpj' => '11.111.111/0001-11'],
        ['nome' => 'Floricultura Bela Flor', 'contato' => '(41) 99999-1111']
    );

    Fornecedor::firstOrCreate(
        ['cnpj' => '22.222.222/0001-22'],
        ['nome' => 'Flores do Campo', 'contato' => '(41) 98888-2222']
    );
}
}
