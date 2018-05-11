<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->bigInteger('id_facebook')->unsigned()->nullable();
            $table->string('nome')->nullable();
            $table->string('curso');
            $table->timestamps();

            $table->primary('id_facebook');
        });

        Schema::table('avaliacoes', function (Blueprint $table) {
            $table->bigInteger('id_facebook')
                    ->unsigned()
                    ->nullable()
                    ->after('turno')
                    ->onDelete('cascade')
                    ->onUpdate('delete');
            $table->foreign('id_facebook')->references('id_facebook')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('avaliacoes', function (Blueprint $table) {
            $table->dropForeign('avaliacoes_id_facebook_foreign');
            $table->dropColumn('id_facebook');
        });
        Schema::drop('usuarios');
    }
}
