<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    public $table = 'avaliacoes';
    protected $fillable = ['id_facebook', 'turno', 'voto', 'opniao','visto'];
}
