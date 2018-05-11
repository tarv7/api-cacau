<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurtidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curtidas', function (Blueprint $table) {
            $table->bigInteger('id_facebook')->unsigned();
            $table->integer('id_avaliacao')->unsigned();

            $table->primary(['id_facebook', 'id_avaliacao']);
            $table->foreign('id_facebook')->references('id_facebook')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_avaliacao')->references('id')->on('avaliacoes')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('id_facebook');
        $table->dropForeign('id_avaliacao');
        Schema::drop('curtidas');
    }
}
