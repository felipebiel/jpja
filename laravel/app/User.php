<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Entidade;
use App\Models\Pontuacao;
use App\Models\Temas_placar;


class User extends Authenticatable
{
   
    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Entidade(){
    
        return $this->hasOne(Entidade::class, 'users_id', 'id');
    }

    public function getPontuacao($id_tema){/*retorna toda pontuação do cara*/
    	$pontuacao = Pontuacao::where('users_id', '=' , $this->id, 'AND')
    							->where('temas_id', '=', $id_tema)
    							->get();

    	$pontos = '';						
    	foreach ($pontuacao as $pont) {
    		$pontos += $pont->ponto;
    	}
    	return $pontos;

    }

    public function Pontuacao($id_tema){/*retorna toda pontuação do cara*/
    	$pontuacao = Pontuacao::where('users_id', '=' , $this->id, 'AND')
    							->where('temas_id', '=', $id_tema)
    							->get();
    	return $pontuacao;

    }

    public function getPorcentagem($id_tema){/*retorna toda o tema placar do cara*/
        $TemasPlacar = Temas_placar::where('users_id', '=' , $this->id, 'AND')
                                ->where('temas_id', '=', $id_tema)
                                ->first();

        $porcentagem = 0;
        if(!empty($TemasPlacar->id)){
            $porcentagem = $TemasPlacar->porcentagem;
        }

        return $porcentagem;

    }

    public function getPontuacaoTotal($id_tema){/*retorna toda o tema placar do cara*/
        $TemasPlacar = Temas_placar::where('users_id', '=' , $this->id, 'AND')
                                ->where('temas_id', '=', $id_tema)
                                ->first();

        $pontos = 0;
        if(!empty($TemasPlacar->id)){
            $pontos = $TemasPlacar->pontos;
        }

        return $pontos;

    }
}
