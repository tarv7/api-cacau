<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Curtida;

class CurtidaController extends Controller
{
    public function curtir(Request $input){
        $curtida = new Curtida();

        $curtida->fill($input->all());
        $curtida->save(['timestamps' => false]);

        return response()->json(['mensagem' => 'curtiu'], 200);
    }

    /*
    public function devolve(Request $input){
        $quem = Curtida::where('id_avaliacao', '=', $input->id_avaliacao)->count();

        return $quem;
    }
    */
}
