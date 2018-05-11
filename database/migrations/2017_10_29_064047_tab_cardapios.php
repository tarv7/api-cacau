<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabCardapios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardapios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->date('data');
            $table->string('opcao');
            $table->integer('subgrupo_id')->unsigned();

            $table->integer('turno_id')->unsigned();

            $table->timestamps();

            //$table->primary('data');
        });
        Schema::table('cardapios', function (Blueprint $table) {
            $table->foreign('subgrupo_id')->references('id')->on('subgrupos');
            $table->foreign('turno_id')->references('id')->on('turnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cardapios');
    }
}
