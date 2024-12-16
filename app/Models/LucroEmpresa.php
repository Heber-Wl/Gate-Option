<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LucroEmpresa extends Model
{
    protected $fillable = [
        'id_empresa',
        'id_investimento',
        'id_user',
        'valor_investido',
        'mes_1',
        'mes_2',
        'mes_3',
        'mes_4',
        'mes_5',
        'mes_6',
        'mes_7',
        'mes_8',
        'mes_9',
        'mes_10',
        'mes_11',
        'mes_12',
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }

    public function investimento() {
        return $this->belongsTo(DadosInvestimento::class, 'id_investimento');
    }

    public function usuario() {
        return $this->belongsTo(Dados::class, 'id_user');
    }

}
