<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subgrupo extends Model
{
    //
    protected $fillable = [
      'id',
      'nomeSubgrupo'
    ];


    public function cardapios () {
        return $this->hasMany(Cardapio::class,'subgrupo_id');
    }
}
