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

    public function confirmar(Request $input){
        $evento = Evento::where('id', '=', $input->id)->get()->first();
        if($evento){
            $evento->confirmaram++;
            $evento->save();

            return response()->json(['mensagem' => 'confirmou'], 200);
        }else{
            return response()->json(['mensagem' => 'evento invalido'], 404);
        }
    }

    public function destaque(Request $input){
        $eventos = Evento::where('destaque', '=', 1)->get();

        return response()->json($eventos, 200);
    }

    public function cidades(Request $input){
        $eventos = Evento::all();

        $cidades = [];
        for($i = 0; $i < count($eventos); $i++){
            $cidades[$i] = $eventos[$i]->cidade;
        }

        $cidades = array_unique($cidades);

        $a = [];
        foreach($cidades as $b)
            $a[] = $b;
            
        return $a;
    }
}
