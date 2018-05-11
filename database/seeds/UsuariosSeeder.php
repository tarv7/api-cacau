<?php

use Illuminate\Database\Seeder;

// Falta mudar os dados pra inserir e atualizar com os dados vindo do POST

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'id_facebook' => rand(1, 1000),
            'nome' => 'Thales Augusto',
            'curso' => str_random(10),
        ]);
    }
}
