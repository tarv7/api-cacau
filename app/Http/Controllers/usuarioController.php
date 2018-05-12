<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Usuario;

class usuarioController extends Controller
{
    public function cadastrar(Request $input){
        $usuario = new Usuario($input->all());
        if($usuario)
            $usuario->save();
        else
            return response(200);
    }

    public function todos(){
        $usuario = Usuario::all();
        foreach ($usuario as $a){ 
            $a->produtor = $a->nome;
            unset($a->nome);
        }
        return response()->json($usuario, 200);
    }

    public function produtor(Request $input){
        $usuario = Usuario::find($input->id);
        if($usuario){
            return response()->json($usuario, 200);
        }else{
            return response()->json(['mensagem' => 'Usuario nao encontrado'], 404);
        }
    }

    public function logar(Request $input){
        $usuario = Usuario::where('email', '=', $input->email)
                            ->where('senha', '=', $input->senha)
                            ->get()->first();

        if($usuario){
            return response()->json(['mensagem' => 'valido'], 200);
        }else{
            return response()->json(['mensagem' => 'invalido'], 404);
        }
    }
}
