<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        $this->call(SubgruposTableSeeder::class);
        $this->call(TurnosTableSeeder::class);
        $this->call(CardapiosSeeder::class);
        $this->call(UsuariosSeeder::class);
	    $this->call(AvaliacoesSeeder::class);

        Model::reguard();
    }
}
