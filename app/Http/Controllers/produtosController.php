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

        $j = 0;
        for($i = 0; $i < count($produtos); $i++){
            $produtos[$i]->nomeProdutor = Usuario::where('id', '=', $produtos[$i]->id_produtor)
                                                    ->get()->first()->nome;
            $produtos[$i]->idProdutor = Usuario::where('id', '=', $produtos[$i]->id_produtor)
                                                    ->get()->first()->id;
            $produtos[$i]->curtidas = $j++;
        }

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
        $produto = Produtos::where('id', '=', $input->id_produto)
                            ->where('id_produtor', '=', $input->id)
                            ->get()->first();

        if($produto){
            return response()->json($produto, 200);
        }else{
            return response()->json(['mensagem' => 'invalido'], 404);
        }
    }
}
