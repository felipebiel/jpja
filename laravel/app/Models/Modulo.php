<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Modulos_tema;


class Modulo extends Model
{
    protected $table = 'modulos';/*nome da tabela*/

	public $timestamps = true;

	use SoftDeletes;/*usa o softdelete*/

	protected $dates = ['deleted_at'];

	protected $fillable =[
/*aqui vc lista todos os campos que podem ser iseridos ou alterados da tabela*/
		'nome',
		'descricao',
		'imagem',
		'customização',	
	];

	public function ModulosTemas(){
		return $this->hasMany(Modulos_tema::class, 'modulos_id', 'id');

	}
}
