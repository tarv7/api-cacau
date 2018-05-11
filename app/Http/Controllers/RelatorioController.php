<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avaliacao;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RelatorioController extends Controller
{
    public function mostra(Request $input){
        if($input->from == "")
            $input->from = "2017-01-01";
        if($input->to == "")
            $input->to = date("Y-m-d");

        $avaliacoes = Avaliacao::where('data', '>=', $input->from)
                                 ->where('data', '<=', $input->to)
                                 ->orderBy('data', 'desc')
                                 ->get();

        $qAval = array(0, 0, 0, 0, 0, 0);
        foreach($avaliacoes as $avaliacao){
            $qAval[intval($avaliacao->voto)]++;
        }

        return view('relatorios')->with('avaliacoes', $avaliacoes)
                                 ->with('qAval', $qAval);
    }

    public function escolhe(){
        return view('AdmRelatorios');
    }
}
