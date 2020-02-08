<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Tema;

class Modulos_tema extends Model
{
    protected $table = 'modulos_temas';/*nome da tabela*/

	public $timestamps = true;

	use SoftDeletes;/*usa o softdelete*/

	protected $dates = ['deleted_at'];

	protected $fillable =[
/*aqui vc lista todos os campos que podem ser iseridos ou alterados da tabela*/
		'modulos_id',
		'temas_id',	
	];

	public function Tema(){
		return $this->hasOne(Tema::class, 'id', 'temas_id');
	}
}
