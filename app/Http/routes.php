<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('formCardapio/', function(){
    return view('formCardapio');
});

Route::get('relatorios/', 'RelatorioController@escolhe');
Route::get('relatorio/', 'RelatorioController@mostra');

Route::group(['prefix' => 'api'], function(){

    Route::get('cardapio/', 'CardapioController@devolve');

    Route::post('cardapio/', 'CardapioController@insere');

    Route::get('avaliacao/', 'AvaliacaoController@devolve');

    Route::get('evaluationCount/', 'AvaliacaoController@evaluationCount');
    
    Route::get('subgroup/', 'CardapioController@getSubgroup');

    Route::get('statistics/', 'AvaliacaoController@statistics');

    Route::get('avaliacoes/', 'AvaliacaoController@devolveN');

    Route::get('verificavotou/', 'AvaliacaoController@verificaVotou');

    Route::post('avaliacao/', 'AvaliacaoController@insere');

    Route::post('curtida/', 'CurtidaController@curtir');
    //Route::get('curtida/', 'CurtidaController@devolve');
});

Route::group(array('prefix' => 'api'), function(){
    Route::get('/', function(){
        return response()->json(['message' => 'Cacau API', 'status' => 'Conectado']);
    });
 
    //get produtores
    Route::get('usuarios', 'usuarioController@todos'); // v
    //get produtor
    Route::get('usuarios/{id}', 'usuarioController@produtor'); // v

    //get produtos geral
    Route::get('produtos', 'produtosController@todos'); // v
    //get produtos especificos de um produtor
    Route::get('produtos/{id}', 'produtosController@deUmProdutor'); // v
    //get produto especifico de um produtor
    Route::get('produtos/{id}/{id_produto}', 'produtosController@especifico'); // x

    //post cadastrar usuario, mas nem precisa disso, vai cadastrar na mao mesmo
    Route::post('cadUsuario', 'usuarioController@cadastrar'); // v
    //get login usuario
    Route::post('loginUsuario', 'usuarioController@logar'); // v


    //get cadastrar produtos
    //post cadastrar evento
    //get eventos



    
 });
 
 Route::get('/', function(){
    return redirect('api');
 });
 