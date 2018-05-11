<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curtida extends Model
{
    protected $fillable = [
        'id_facebook',
        'id_avaliacao'
    ];
}
