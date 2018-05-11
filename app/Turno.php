<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $fillable = [
      'id',
      'nomeTurno'
    ];

    public function cardapios () {
        return $this->hasMany(Cardapio::class,'turno_id');
    }

}
