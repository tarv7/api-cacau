<?php

use Illuminate\Database\Seeder;
use App\Turno;

class TurnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $turno1 = new Turno();
        $turno1->nomeTurno = 'cafe';
        $turno1->save();

        $turno2 = new Turno();
        $turno2->nomeTurno = 'almoco';
        $turno2->save();

        $turno3 = new Turno();
        $turno3->nomeTurno = 'janta';
        $turno3->save();
    }
}
