<?php

use Illuminate\Database\Seeder;
use App\Subgrupo;

class SubgruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subgrupo1 = new Subgrupo();
        $subgrupo1->nomeSubgrupo = 'Salada';
        $subgrupo1->save();
        

        $subgrupo2 = new Subgrupo();
        $subgrupo2->nomeSubgrupo = 'Prato Principal';
        $subgrupo2->save();

        $subgrupo3 = new Subgrupo();
        $subgrupo3->nomeSubgrupo = 'Bebida';
        $subgrupo3->save();

        $subgrupo4 = new Subgrupo();
        $subgrupo4->nomeSubgrupo = 'Acompanhamento';
        $subgrupo4->save();

        $subgrupo5 = new Subgrupo();
        $subgrupo5->nomeSubgrupo = 'Sobremesa';
        $subgrupo5->save();

        $subgrupo6 = new Subgrupo();
        $subgrupo6->nomeSubgrupo = 'Prato Vegetariano';
        $subgrupo6->save();

        $subgrupo7 = new Subgrupo();
        $subgrupo7->nomeSubgrupo = 'Entrada';
        $subgrupo7->save();

        $subgrupo8 = new Subgrupo();
        $subgrupo8->nomeSubgrupo = 'Guarnição';
        $subgrupo8->save();
    }
}
