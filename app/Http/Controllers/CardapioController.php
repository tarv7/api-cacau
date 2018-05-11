<?php

namespace App\Http\Controllers;

ini_set('display_errors', '0');     # don't show any errors...
error_reporting(E_ALL | E_STRICT);  # ...but do log them

use App\Cardapio;
use App\Turno;
use App\Subgrupo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CardapioController extends Controller
{
    public function devolve(){
        $cardapios = Cardapio::where('data', '=', date('Y-m-d'))->get();

        $cafe=array();
        $almoco=array();
        $janta=array();
        $Subgrupo=array();

        foreach ($cardapios as $cardapio){
            $nome = Subgrupo::where('id', '=', $cardapio->subgrupo_id)
                              ->get()->first()->nomeSubgrupo;

            $aux = array();
            $aux['name'] = $nome;
            $aux['value'] = explode(',', $cardapio->opcao);

            if($cardapio->turno_id == 1){
                array_push($cafe, $aux);
            }

            if($cardapio->turno_id == 2){
                array_push($almoco, $aux);
            }

            if($cardapio->turno_id == 3){
                array_push($janta, $aux);
            }

        }

        return response()->json([
                ['name' => "café", 'value' => $cafe],
                ['name' => "almoço", 'value' => $almoco],
                ['name' => "jantar", 'value' => $janta]
            ], 200);
    }

    public function getSubgroup(){
        $subs = Subgrupo::all('id','nomeSubgrupo');
        return response()->json(
             $subs
        ,200);

    }
    
    public function insere(Request $input){
        if(Turno::where('id', '=' , $input->turno)->count() == 0){
            return response()->json(['message' => 'cardapio invalido'], 400);
        }

        
        $card = Cardapio::where('data', '=', date('Y-m-d'))
                          ->where('turno_id', '=', $input->turno)
                          ->delete();
       

        $subs = Subgrupo::all();        
        for($i = 0; $i < count($subs); $i++){
            $aux = $subs[$i]->id;
            if($input->$aux){
                $cardapio = new Cardapio();
                $cardapio->data = $input->picker;
                $cardapio->opcao = $input->$aux;
                $cardapio->subgrupo_id = $aux;
                $cardapio->turno_id = $input->turno;
                $cardapio->save();
            }
        }

        return $input->all();

    }
/*
    public function insere(){

    }
*/
}
