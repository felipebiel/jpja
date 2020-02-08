<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRespostaToPerguntas extends Migration
{
    
    public function up()
    {
        
        Schema::table('perguntas', function($table) {
        $table->string('resposta', 255)->nullable();
        });

    }

    public function down()
    {
        Schema::table('perguntas', function($table) {
            $table->dropColumn('resposta');
        });

    }
}
