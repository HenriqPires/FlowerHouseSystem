<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendaProduto extends Model
{
    protected $table = 'venda_produto';

    protected $fillable = [
        'venda_id', 'produto_id', 'quantidade', 'preco_unitario'
    ];
}
