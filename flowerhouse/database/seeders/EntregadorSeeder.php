<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EntregadorSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'entregador@flowerhouse.com'],
            [
                'name' => 'Entregador',
                'password' => Hash::make('entregador123'),
                'tipo' => 'entregador',
            ]
        );
    }
}
