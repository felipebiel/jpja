<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Pergunta;

class Perguntas_tema extends Model
{
    protected $table = 'perguntas_temas';/*nome da tabela*/

	public $timestamps = true;

	use SoftDeletes;/*usa o softdelete*/

	protected $dates = ['deleted_at'];

	protected $fillable =[
/*aqui vc lista todos os campos que podem ser iseridos ou alterados da tabela*/
		'temas_id',
		'perguntas_id',
	];

	public function Pergunta(){
		return $this->hasOne(Pergunta::class, 'id', 'perguntas_id');
	}

}
