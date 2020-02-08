<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Perguntas_tema;


class Tema extends Model
{
    protected $table = 'temas';/*nome da tabela*/

	public $timestamps = true;

	use SoftDeletes;/*usa o softdelete*/

	protected $dates = ['deleted_at'];

	protected $fillable =[
	/*aqui vc lista todos os campos que podem ser iseridos ou alterados da tabela*/
		'nome',
		'imagem',
		'customizacao',
		'descricao',	
	];

	public function PerguntasTemas(){
		return $this->hasMany(Perguntas_tema::class, 'temas_id', 'id');

	}
}
