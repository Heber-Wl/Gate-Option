<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DadosInvestimento extends Model
{

    protected $table = 'dados_investimento';

    protected $fillable = [
        'id_user',
        'id_empresa',
        'lucro',
        'meu_investimento',
        'minhas_acoes',
        'tempo',
        'valor_final',
    ];

    public function lucro() {
        return $this->hasMany(LucroEmpresa::class, 'id_investimento', 'id');
    }

    public function usuario() {
        return $this->belongsTo(Dados::class, 'id_user');
    }

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
}
