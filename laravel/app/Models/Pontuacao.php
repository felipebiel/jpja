<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pontuacao extends Model
{
    protected $table = 'pontuacao';/*nome da tabela*/

	public $timestamps = true;

	use SoftDeletes;/*usa o softdelete*/

	protected $dates = ['deleted_at'];

	protected $fillable =[
	/*aqui vc lista todos os campos que podem ser iseridos ou alterados da tabela*/
		'users_id',
		'perguntas_temas_id',
		'ponto',
		'acertou',
		'temas_id'	
	];
}
