<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Evento;

class eventoController extends Controller
{
    public function todos(Request $input){
        $eventos = Evento::all();

        return response()->json($eventos, 200);
    }

    public function deUmaCidade(Request $input){
        $eventos = Evento::where('cidade', '=', $input->cidade)->get();

        if($eventos)
            return response()->json($eventos, 200);
        else
            return response()->json([], 404);
    }
}
