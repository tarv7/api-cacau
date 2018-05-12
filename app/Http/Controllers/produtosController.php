<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produtos;
use App\Usuario;

class produtosController extends Controller
{

    public function todos(){
        $produtos = Produtos::all();

        return response()->json($produtos, 200);
    }

    public function deUmProdutor(Request $input){
        $usuario = Usuario::find($input->id);
        if(!$usuario)
            return response()->json(['mensagem' => 'usuario invalido'], 404);

        $produtos = Produtos::where('id_produtor', '=', $input->id)->get();

        return response()->json($produtos, 200);
    }

    public function especifico(Request $input){
        $produto = Produto::where('id', '=', $input->id_produto)
                            ->where('id_produtor', '=', $input->id)
                            ->get()->first();

        if($usuario){
        return response()->json(['mensagem' => 'valido'], 200);
        }else{
        return response()->json(['mensagem' => 'invalido'], 404);
        }
    }
}
