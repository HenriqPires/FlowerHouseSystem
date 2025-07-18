<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{

    protected $table = 'fornecedores';

    protected $fillable = [
        'nome', 'contato', 'cnpj'
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
