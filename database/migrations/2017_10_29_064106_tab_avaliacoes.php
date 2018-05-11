<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabAvaliacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('data')->nullable();
            $table->string('turno')->nullable();
            //$table->integer('usuario')->unsigned();
            //$table->foreign('usuario')->references('id_facebook')->on('usuarios');
            $table->string('opniao')->nullable();
            $table->integer('voto')->nullable();
            $table->integer('visto')->nullable()->unsigned();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('avaliacoes');
    }
}
