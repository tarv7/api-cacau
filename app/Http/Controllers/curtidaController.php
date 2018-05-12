<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produtos;
use App\Usuario;

class curtidaController extends Controller
{
    public function curtirProdutor(Request $input){
        $produtor = Usuario::where('id', '=', $input->id_produtor)->get()->first();
        
        if($produtor){
            $produtor->curtidas++;
            $produtor->save();

            return response()->json(['mensagem' => 'curtiu'], 200);
        }else{
            return response()->json([], 404);
        }
    }

    public function curtirProduto(Request $input){
        $produto = Produtos::where('id', '=', $input->id_produto)
                              ->where('id_produtor', '=', $input->id_produtor)
                              ->get()->first();
        if($produto){
            $produto->curtidas++;
            $produto->save();

            return response()->json(['mensagem' => 'curtiu'], 200);
        }else{
            return response()->json([], 404);
        }
    }

    public function descurtirProdutor(Request $input){
        $produtor = Usuario::where('id', '=', $input->id_produtor)->get()->first();
        
        if($produtor && $produtor->curtidas > 0){
            $produtor->curtidas--;
            $produtor->save();

            return response()->json(['mensagem' => 'descurtiu'], 200);
        }else{
            return response()->json(['mensagem' => 'invalido'], 404);
        }
    }

    public function descurtirProduto(Request $input){
        $produto = Produtos::where('id', '=', $input->id_produto)
                              ->where('id_produtor', '=', $input->id_produtor)
                              ->get()->first();
        if($produto && $produto->curtidas > 0){
            $produto->curtidas--;
            $produto->save();

            return response()->json(['mensagem' => 'descurtiu'], 200);
        }else{
            return response()->json(['mensagem' => 'invalido'], 404);
        }
    }
}
