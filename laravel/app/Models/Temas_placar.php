<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Temas_placar extends Model
{
    protected $table = 'temas_placar';/*nome da tabela*/

	public $timestamps = true;

	use SoftDeletes;/*usa o softdelete*/

	protected $dates = ['deleted_at'];

	protected $fillable =[
	/*aqui vc lista todos os campos que podem ser iseridos ou alterados da tabela*/
		'users_id',
		'temas_id',
		'pontos',
		'status',	
		'etapa',
		'porcentagem'
	];
}
