<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerguntasTemasTable extends Migration
{
    
    public function up()
    {
     Schema::create('perguntas_temas', function(Blueprint $table) {
        
            $table->increments('id');
            $table->integer('temas_id')->unsigned();
            $table->integer('perguntas_id')->unsigned();
        
            $table->index('temas_id','fk_perguntas_temas_temas1_idx');
            $table->index('perguntas_id','fk_perguntas_temas_perguntas1_idx');
        
            $table->foreign('temas_id')
                ->references('id')->on('temas');
        
            $table->foreign('perguntas_id')
                ->references('id')->on('perguntas');
            $table->softDeletes();
            $table->timestamps();
        
        });
    }

    public function down()
    {
        Schema::drop('perguntas_temas');
    }
}
