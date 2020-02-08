<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas', function(Blueprint $table) {
        
            $table->increments('id');
            $table->string('tipo', 45)->nullable();
            $table->longText('pergunta')->nullable();
            $table->string('imagem', 255)->nullable();
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
        Schema::drop('perguntas');
    /* serve pra apagar a tabela em questão */
    }

}
