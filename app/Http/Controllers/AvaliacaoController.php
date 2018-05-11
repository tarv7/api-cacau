<?php

namespace App\Http\Controllers;
use DB;
use App\Avaliacao;
use App\Usuario;
use App\Curtida;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AvaliacaoController extends Controller
{
    public function devolve(){
        // $avaMenosVista = Avaliacao::where('visto', '=', Avaliacao::min('visto'))
        //                             ->orWhere('id_facebook', '<>', 0)
        //                             ->get()->first();
        if(Avaliacao::orderBy('id','desc')->where('data','=',date('Y-m-d'))->where('visto', '=', Avaliacao::where('data','=',date('Y-m-d'))->min('visto'))->where('id_facebook', '<>', 0)->count() > 1){
            
            $avaMenosVista = Avaliacao::orderBy('id','desc')->where('data','=',date('Y-m-d'))->where('visto', '=', Avaliacao::where('data','=',date('Y-m-d'))->min('visto'))->where('id_facebook', '<>', 0)->get()->first();
            $avaMenosVista->visto += 1;
        }else if($avaMenosVista = Avaliacao::orderBy('id','desc')->where('data','=',date('Y-m-d'))->where('id_facebook', '<>', 0)->count() == 1){
            $avaMenosVista = Avaliacao::orderBy('id','desc')->where('data','=',date('Y-m-d'))->where('id_facebook', '<>', 0)->get()->first();
        }else
        if(Avaliacao::orderBy('id','desc')->where('data','=',date('Y-m-d'))->where('visto', '=', Avaliacao::where('data','=',date('Y-m-d'))->min('visto'))->where('id_facebook', '<>', 0)->count() > 0){
            
            $avaMenosVista = Avaliacao::orderBy('id','desc')->where('data','=',date('Y-m-d'))->where('visto', '=', Avaliacao::where('data','=',date('Y-m-d'))->min('visto'))->where('id_facebook', '<>', 0)->get()->first();
            $avaMenosVista->visto += 1;
        }else {
            $avaMenosVista = Avaliacao::orderBy('id','desc')->where('id_facebook', '<>', 0)->get()->first();
        
                        
        }
            
        

        $avaMenosVista->save();
        // $avaMenosVista = [$avaMenosVista, Usuario::where('id_facebook', '=', $avaMenosVista->id_facebook)->get()];
        $usuarios = Usuario::where('id_facebook', '=', $avaMenosVista->id_facebook)->get();
        foreach ($usuarios as $usuario){
            $aux = $usuario;
        }
        // return $avaMenosVista;
        // $avaMenosVista->nome = $usuario->nome;
        $avaliacao=array();
        $qCurt = Curtida::where('id_avaliacao', '=', $avaMenosVista->id)->count();
        $avaMenosVista->curtidas = $qCurt;
        array_push($avaliacao, $avaMenosVista);
        $user=array();
        array_push($user, $aux);


        return response()->json([
            ['name' => $user,'value' => $avaliacao]
        ],200);
            // 'name' => $avaMenosVista, 'value' => $usuario], 200);
    }

    public function devolveN(Request $input){
        //parametros:
        //{'id'}
        if ($input->id) {
            # devolve as novas avaliações após um ID
            $avaliacoes = Avaliacao::orderBy('id','desc')->where('id','>',$input->id)->where('id_facebook', '<>', 0)->take(20)->get();
        }else {
            # caso contrario retorna as ultimas 20
            $avaliacoes = Avaliacao::orderBy('id','desc')->where('id_facebook', '<>', 0)->take(20)->get();
        }
        foreach ($avaliacoes as $avaliacao) {
            $qCurt = Curtida::where('id_avaliacao', '=', $avaliacao->id)->count();
            $avaliacao->curtidas = $qCurt;
            $avaliacao->name = Usuario::where('id_facebook', '=', $avaliacao->id_facebook)->get();

        }
        return $avaliacoes;
    }
    public function evaluationCount(){
        $countDay = Avaliacao::where('data','=',date('Y-m-d'))->count();
        return response()->json([
            'quantidade'=> $countDay
        ],200);
   }

    public function verificaVotou(Request $input){
        //parametros:
        //{'id_facebook'}
        $response =(object) ["done" => false];
        $turno = ['cafe','almoco','janta'];
        if(date('H:i:s') <= date('10:00:00')){
            $turnoAtual = $turno[0];
        }
        if(date('H:i:s') > date('10:00:00') && date('H:i:s') < date('17:30:00')){
            $turnoAtual = $turno[1];
        }
        if(date('H:i:s') >= date('17:30:00')){
            $turnoAtual = $turno[2];
        }

        if(Avaliacao::where('id_facebook', '=', $input->id_facebook)
                    ->where('data', '=', date('Y-m-d'))
                    ->where('turno', '=', $turnoAtual)->count() > 0){

            $response->done= true;
        }
        return response()->json(['done' => $response->done], 200);
    }

    public function insere(Request $input){
        //parametros:
        //{'id_facebook', 'voto', 'opniao'}
        if($input->voto < 1 || $input->voto > 5)
            return response()->json(['message' => 'voto invalido'], 400);
        

        if(Usuario::where('id_facebook', '=', $input->id_facebook)->count() == 0){
            $usuario = new Usuario();
            $usuario->fill($input->all());
            $usuario->save();
        }

	
        $turno = ['cafe','almoco','janta'];
        if(date('H:i:s') <= date('10:00:00')){
            $turnoAtual = $turno[0];
        }
        if(date('H:i:s') > date('10:00:00') && date('H:i:s') < date('17:30:00')){
            $turnoAtual = $turno[1];
        }
        if(date('H:i:s') >= date('17:30:00')){
            $turnoAtual = $turno[2];
        }
        $input->turno = $turnoAtual;


        if($input->turno != 'cafe' && $input->turno != 'almoco' && $input->turno != 'janta')
           return response()->json(['message' => 'Turno invalido'], 400);
        //if(Avaliacao::where('id_facebook', '=', $input->id_facebook)
            //        ->where('data', '=', date('Y-m-d'))
            //        ->where('turno', '=', $input->turno)->count() == 0){
            $aval = new Avaliacao();
            // $aval->fill($input->all());
            $aval->data = date('Y-m-d');
            $aval->id_facebook = $input->id_facebook;
            $aval->turno = $input->turno;
            $aval->voto = $input->voto;
            $aval->opniao = $input->opniao;
            // $menor = Avaliacao::min('visto');Antes pegava o menor de todos,agora ele irá pegar apenas o do dia
            $menor = Avaliacao::where('data','=',$aval->data)->min('visto');
            $aval->visto = ($menor == null) ? 0 : $menor;
            $aval->save();
    //    }else{
        //    return response()->json(['message' => 'O usuario ja voto nesse turno-dia'], 409);
    //    }

        return $input->all();
    }
    public function statistics(){
        /*Retornar um json com:
        {
        "day": [2,5,10,20,1],
        "month": [44,55,34,52,22]
        }*/
        $calcVotoDay = [0,0,0,0,0];
        $avaliacoesOfDay = Avaliacao::where('data','=',date('Y-m-d'))->get();
        foreach ($avaliacoesOfDay as $v) {
            $calcVotoDay[$v->voto-1]++;

        }
        /*$qty1 = DB::table('avaliacoes')
                     ->select(DB::raw('count(*) as qty1'))
                     ->where('voto', '=', 3)
                     ->where('data', '=', date('Y-m-d'))
                     ->groupBy('voto')
                     ->get();
        */
         $day = (object)[
             'qty1'=> $calcVotoDay[0],
             'qty2'=> $calcVotoDay[1],
             'qty3'=> $calcVotoDay[2],
             'qty4'=> $calcVotoDay[3],
             'qty5'=> $calcVotoDay[4]+1
         ];
         $calcVotoMonth = [0,0,0,0,0];
         $avaliacoesOfMonth = Avaliacao::all();
         foreach ($avaliacoesOfMonth as $v) {
             $month = date("m",strtotime($v->updated_at));
             $year = date("Y",strtotime($v->updated_at));
             if(date("m") == $month && date("Y") == $year){
                 $calcVotoMonth[$v->voto-1]++;
            }
         }
         $month = (object)[
             'qty1'=> $calcVotoMonth[0],
             'qty2'=> $calcVotoMonth[1],
             'qty3'=> $calcVotoMonth[2],
             'qty4'=> $calcVotoMonth[3],
             'qty5'=> $calcVotoMonth[4]+1
         ];

        return response()->json(["day" => $day,"month" => $month], 200);

    }
}
