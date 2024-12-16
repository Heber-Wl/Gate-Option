<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    protected $fillable = [
        'nome_empresa',
        'valor_mercado',
        'qtd_acoes',
        'preco_acoes'
    ];
}
