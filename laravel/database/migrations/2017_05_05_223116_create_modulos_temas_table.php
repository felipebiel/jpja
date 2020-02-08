<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTemasTable extends Migration
{
    
    public function up()
    {
        Schema::create('modulos_temas', function(Blueprint $table) {
        
            $table->integer('id');
            $table->integer('modulos_id')->unsigned();
            $table->integer('temas_id')->unsigned();
            
            $table->primary('id');
        
            $table->index('modulos_id','fk_modulos_temas_modulos1_idx');
            $table->index('temas_id','fk_modulos_temas_temas1_idx');
        
            $table->foreign('modulos_id')
                ->references('id')->on('modulos');
        
            $table->foreign('temas_id')
                ->references('id')->on('temas');
            $table->softDeletes();
            $table->timestamps();
        
        });
    }

    public function down()
    {
        Schema::drop('modulos_temas');
    }
}
