<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadesTable extends Migration
{
   
    public function up()
    {
        Schema::create('entidades', function(Blueprint $table) {
        
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->string('tipo', 45)->nullable();
            $table->string('genero', 45)->nullable();
            $table->string('imagem', 255)->nullable();
            $table->string('email_alternativo', 100)->nullable();        
            $table->foreign('users_id')
                ->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        
        });
    }

   
    public function down()
    {
        Schema::drop('entidades');
    }
}
