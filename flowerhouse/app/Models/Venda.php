<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'funcionario_id', 'data', 'total'
    ];

    public function funcionario()
    {
        return $this->belongsTo(User::class, 'funcionario_id');
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'venda_produto')
                    ->withPivot('quantidade', 'preco_unitario')
                    ->withTimestamps();

    }

    public function entrega()
    {
        return $this->hasOne(Entrega::class);
    }
}
