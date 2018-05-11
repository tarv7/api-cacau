<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    protected $fillable = [
      'data',
      'opcao',
      'subgrupo_id',
      'turno_id'
       ];

    protected $table = 'cardapios';

    public function subgrupo()
    {
        return $this->belongsTo(Subgrupo::class, 'subgrupo_id');
    }
    public function turno()
    {
        return $this->belongsTo(Turno::class, 'turno_id');
    }
}
