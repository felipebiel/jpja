<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Opcao;

class Pergunta extends Model
{

protected $table = 'perguntas';/*nome da tabela*/

	public $timestamps = true;

	use SoftDeletes;/*usa o softdelete*/

	protected $dates = ['deleted_at'];

	protected $fillable =[
/*aqui vc lista todos os campos que podem ser iseridos ou alterados da tabela*/
		'tipo',
		'pergunta',
		'imagem',
		'resposta',	
	];
	public function Opcoes(){
		return $this->hasMany(Opcao::class, 'perguntas_id', 'id');

	}
}
