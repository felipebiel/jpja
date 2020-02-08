<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePontuacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('pontuacao', function(Blueprint $table) {
        
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('perguntas_temas_id')->unsigned();
            $table->string('ponto', 45)->nullable();
            $table->boolean('acertou')->nullable();
            $table->integer('temas_id')->unsigned();
        
            $table->index('users_id','fk_pontuacao_users1_idx');
            $table->index('perguntas_temas_id','fk_pontuacao_perguntas_temas1_idx');
            $table->index('temas_id','fk_pontuacao_temas1_idx');
        
            $table->foreign('users_id')
                ->references('id')->on('users');
        
            $table->foreign('perguntas_temas_id')
                ->references('id')->on('perguntas_temas');
        
            $table->foreign('temas_id')
                ->references('id')->on('temas');
                
            $table->softDeletes();
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
        Schema::drop('pontuacao');
    }
}
