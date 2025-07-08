<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class FuncionarioSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'funcionario@flowerhouse.com'],
            [
                'name' => 'Funcionário',
                'password' => Hash::make('func123'),
                'tipo' => 'funcionario',
            ]
        );
    }
}
