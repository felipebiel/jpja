<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemasPlacarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('temas_placar', function(Blueprint $table) {
               
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('temas_id')->unsigned();
            $table->integer('pontos')->nullable();
            $table->string('status', 45)->nullable();
            $table->integer('etapa')->nullable();
            $table->string('porcentagem', 45)->nullable();
        
            $table->index('users_id','fk_temas_placar_users1_idx');
            $table->index('temas_id','fk_temas_placar_temas1_idx');
        
            $table->foreign('users_id')
                ->references('id')->on('users');
        
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
        Schema::drop('temas_placar');
    }
}
