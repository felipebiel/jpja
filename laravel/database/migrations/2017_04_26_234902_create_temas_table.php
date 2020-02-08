<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemasTable extends Migration
{
    
    public function up()
    {
        Schema::create('temas', function(Blueprint $table) {
        
            $table->increments('id');
            $table->string('nome', 150)->nullable();
            $table->string('imagem', 255)->nullable();
            $table->string('customizacao', 255)->nullable();
            $table->longText('descricao')->nullable();
            $table->softDeletes();
            $table->timestamps();
        
        });
    }

    public function down()
    {
        Schema::drop('temas');
    }
}
