<?php

use Illuminate\Database\Seeder;

// Falta mudar os dados pra inserir e atualizar com os dados vindo do POST

class AvaliacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $menor = DB::table('avaliacoes')->min('visto');
        DB::table('avaliacoes')->insert([
            'id_facebook' => DB::table('usuarios')->get()[rand(1, DB::table('usuarios')->count())-1]->id_facebook,
            'data' => date('Y-m-d'),
            'turno' => 'almoco',
            'voto' => 5,
            'opniao' => 'A comida hoje estava ruim como sempre',
            'visto' => ($menor == null) ? 1 : $menor
        ]);
    }
}
