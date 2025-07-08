<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = [
        'venda_id', 'entregador_id', 'status', 'data_entrega', 'observacoes'
    ];

    public function venda()
    {
        return $this->belongsTo(Venda::class);
    }

    public function entregador()
    {
        return $this->belongsTo(User::class, 'entregador_id');
    }
}
