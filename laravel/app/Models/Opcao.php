<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opcao extends Model
{
    protected $table = 'opcoes';/*nome da tabela*/

	public $timestamps = true;

	use SoftDeletes;/*usa o softdelete*/

	protected $dates = ['deleted_at'];

	protected $fillable =[/*aqui vc lista todos os campos que podem ser iseridos ou alterados da tabela*/
		'perguntas_id',
		'opcao',
		'imagem',
		'correta',	
	];
}
