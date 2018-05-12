<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class Usuario extends Model
{
    public $table = 'tb_usuarios';

    protected $fillable = [
        'tipo', 'artesanal', 'exportador', 'nome',
        'email', 'senha', 'email', 'senha', 'foto',
        'cnpj', 'cidade', 'estado', 'endereco',
        'latitude', 'longitude'
    ];
}
