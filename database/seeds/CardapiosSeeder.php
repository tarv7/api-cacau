<?php

use Illuminate\Database\Seeder;
use App\Cardapio;

// Falta mudar os dados pra inserir e atualizar com os dados vindo do POST

class CardapiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $subgrupo1->nomeSubgrupo = 'Salada';
        // $subgrupo2->nomeSubgrupo = 'Prato Principal';
        // $subgrupo3->nomeSubgrupo = 'Suco';
        // $subgrupo4->nomeSubgrupo = 'Acompanhamento';
        // $subgrupo5->nomeSubgrupo = 'Sobremesa';
        // $subgrupo6->nomeSubgrupo = 'Prato Vegetariano';
        // $subgrupo7->nomeSubgrupo = 'Entrada';
        // $subgrupo8->nomeSubgrupo = 'Guarnição';
        
        //CAFE
        $cardapio = new Cardapio();
        $cardapio->data = date('Y-m-d');
        $cardapio->opcao = 'melao,melancia';
        $cardapio->subgrupo_id = 5;
        $cardapio->turno_id = 1;
        $cardapio->save();

        $cardapio2 = new Cardapio();
        $cardapio2->data = date('Y-m-d');
        $cardapio2->opcao = 'goiaba,acerola,Café,Leite Quente/Frio';
        $cardapio2->subgrupo_id = 3;
        $cardapio2->turno_id = 1;
        $cardapio2->save();

        $cardapio3 = new Cardapio();
        $cardapio3->data = date('Y-m-d');
        $cardapio3->opcao = 'Pão Carioca,Pão Sovado,cuscuz';
        $cardapio3->subgrupo_id = 4;
        $cardapio3->turno_id = 1;
        $cardapio3->save();

        
        $cardapio4 = new Cardapio();
        $cardapio4->data = date('Y-m-d');
        $cardapio4->opcao = 'frango,panqueca,calabresa,Batata doce,Aipim';
        $cardapio4->subgrupo_id = 2;
        $cardapio4->turno_id = 1;
        $cardapio4->save();

        $cardapio6 = new Cardapio();
        $cardapio6->data = date('Y-m-d');
        $cardapio6->opcao = 'soja,lentilha';
        $cardapio6->subgrupo_id = 6;
        $cardapio6->turno_id = 1;
        $cardapio6->save();

    
        // $subgrupo1->nomeSubgrupo = 'Salada'ok;
        // $subgrupo2->nomeSubgrupo = 'Prato Principal'ok;
        // $subgrupo3->nomeSubgrupo = 'Suco'ok;
        // $subgrupo4->nomeSubgrupo = 'Acompanhamento'ok;
        // $subgrupo5->nomeSubgrupo = 'Sobremesa'ok;
        // $subgrupo6->nomeSubgrupo = 'Prato Vegetariano';
        // $subgrupo7->nomeSubgrupo = 'Entrada';
        // $subgrupo8->nomeSubgrupo = 'Guarnição';
        //ALMOÇO
        $cardapio7 = new Cardapio();
        $cardapio7->data = date('Y-m-d');
        $cardapio7->opcao = 'alface,cenoura';
        $cardapio7->subgrupo_id = 1;
        $cardapio7->turno_id = 2;
        $cardapio7->save();

        $cardapio8 = new Cardapio();
        $cardapio8->data = date('Y-m-d');
        $cardapio8->opcao = 'carne,frango';
        $cardapio8->subgrupo_id = 2;
        $cardapio8->turno_id = 2;
        $cardapio8->save();

        $cardapio9 = new Cardapio();
        $cardapio9->data = date('Y-m-d');
        $cardapio9->opcao = 'manga,tamarindo, maracuja';
        $cardapio9->subgrupo_id = 3;
        $cardapio9->turno_id = 2;
        $cardapio9->save();

        $cardapio10 = new Cardapio();
        $cardapio10->data = date('Y-m-d');
        $cardapio10->opcao = 'farofa, Arroz Branco, Arroz Integral, Feijão Preto';
        $cardapio10->subgrupo_id = 4;
        $cardapio10->turno_id = 2;
        $cardapio10->save();

        $cardapio215 = new Cardapio();
        $cardapio215->data = date('Y-m-d');
        $cardapio215->opcao = 'Melancia';
        $cardapio215->subgrupo_id = 5;
        $cardapio215->turno_id = 2;
        $cardapio215->save();

        $cardapio12 = new Cardapio();
        $cardapio12->data = date('Y-m-d');
        $cardapio12->opcao = 'Soja Tropical, lentilha';
        $cardapio12->subgrupo_id = 6;
        $cardapio12->turno_id = 2;
        $cardapio12->save();

        $cardapio216 = new Cardapio();
        $cardapio216->data = date('Y-m-d');
        $cardapio216->opcao = 'Macarrão Espaguete';
        $cardapio216->subgrupo_id = 8;
        $cardapio216->turno_id = 2;
        $cardapio216->save();

        // $subgrupo1->nomeSubgrupo = 'Salada';
        // $subgrupo2->nomeSubgrupo = 'Prato Principal'ok;
        // $subgrupo3->nomeSubgrupo = 'Suco'ok;
        // $subgrupo4->nomeSubgrupo = 'Acompanhamento'ok;
        // $subgrupo5->nomeSubgrupo = 'Sobremesa';
        // $subgrupo6->nomeSubgrupo = 'Prato Vegetariano ok';
        // $subgrupo7->nomeSubgrupo = 'Entrada';
        // $subgrupo8->nomeSubgrupo = 'Guarnição';
        //JANTA
        $cardapio15 = new Cardapio();
        $cardapio15->data = date('Y-m-d');
        $cardapio15->opcao = 'Lasanha de Carne,Sopa de frango';
        $cardapio15->subgrupo_id = 2;
        $cardapio15->turno_id = 3;
        $cardapio15->save();

    
        $cardapio17 = new Cardapio();
        $cardapio17->data = date('Y-m-d');
        $cardapio17->opcao = 'manga,tamarindo';
        $cardapio17->subgrupo_id = 3;
        $cardapio17->turno_id = 3;
        $cardapio17->save();

        $cardapio19 = new Cardapio();
        $cardapio19->data = date('Y-m-d');
        $cardapio19->opcao = 'bolo de cenoura,cuscuz';
        $cardapio19->subgrupo_id = 4;
        $cardapio19->turno_id = 3;
        $cardapio19->save();

        $cardapio311 = new Cardapio();
        $cardapio311->data = date('Y-m-d');
        $cardapio311->opcao = 'melão,melancia';
        $cardapio311->subgrupo_id = 5;
        $cardapio311->turno_id = 3;
        $cardapio311->save();

        $cardapio15 = new Cardapio();
        $cardapio15->data = date('Y-m-d');
        $cardapio15->opcao = 'Almôndegas de Soja';
        $cardapio15->subgrupo_id = 6;
        $cardapio15->turno_id = 3;
        $cardapio15->save();

        $cardapio313 = new Cardapio();
        $cardapio313->data = date('Y-m-d');
        $cardapio313->opcao = 'Pão francês';
        $cardapio313->subgrupo_id = 7;
        $cardapio313->turno_id = 3;
        $cardapio313->save();








        /*$card = DB::table('cardapios')->where('data', date('Y-m-d'))->first();
        if($card === null){
            DB::table('cardapios')->insert([
                'data' => date('Y-m-d'),
                'cafe' => json_encode([
                    'frutas' => ['melao', 'melancia'],
                    'suco' => ['goaiba', 'acerola'],
                    'outros' => ['pao', 'cuzcuz']
                    ]),
                'almoco' => json_encode([
                    'carne' => ['bife', 'panqueca'],
                    'suco' => ['maracuja', 'caja'],
                    'vegan' => ['soja', 'lentilha']
                ]),
                'jantar' => json_encode([
                    'sopa' => ['carne', 'frango'],
                    'suco' => ['manga', 'tamarindo'],
                    'outros' => ['bolo', 'farofa']
                ]),
            ]);
        }*/
    }
}
