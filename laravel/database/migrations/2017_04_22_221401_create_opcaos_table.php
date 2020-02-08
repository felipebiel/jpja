<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcaosTable extends Migration
{
    
    public function up()
    {
        Schema::create('opcoes', function(Blueprint $table) {
        
            $table->increments('id');
            $table->integer('perguntas_id')->unsigned();
            $table->string('opcao', 255)->nullable();
            $table->string('imagem', 255)->nullable();
            $table->boolean('correta')->nullable();
        
            $table->index('perguntas_id','fk_opcoes_perguntas1_idx');
        
            $table->foreign('perguntas_id')
                ->references('id')->on('perguntas');

            $table->softDeletes();
            $table->timestamps();
        
        });
    }

   
    public function down()
    {
        Schema::drop('opcoes');
    }
}
