<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dados extends Authenticatable
{

    use HasFactory, Notifiable;

    protected $table = 'dados';

    protected $fillable = [
        'nome',
        'email',
        'password',
        'data_nas',
        'deposito'
    ];


}
