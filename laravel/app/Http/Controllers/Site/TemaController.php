<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Tema;
use App\Models\Temas_placar;
use App\Models\Pontuacao;
use App\Models\Opcao;
use App\Models\Pergunta;


class TemaController extends Controller
{
    
    public function index($id)
    {
        
        $tema = Tema::find($id);
        $temas_placar = Temas_placar::where('users_id', '=', \Auth::user()->id, 'AND')
                                    ->where('temas_id', '=', $id, 'AND')
                                    ->first();

        if(!empty($tema->id)){
            $etapa = 0;

            if(!empty($temas_placar)){
                $etapa = $temas_placar->etapa;
            }


            return view('usuarios.tema',
                [
                'tema'=>$tema,
                'etapa'=>$etapa,
                'temas_placar'=>$temas_placar,
                ]);

        }else{
            return redirect('/')->with('erro','Nenhum tema encontrado!');
        }
    }

    
    public function checarResposta(Request $request)
    {
        //dd($request->all());

        $op = Opcao::find($request->opcao);
        $per = Pergunta::find($request->pergunta_id);

        $id_correta = '';/*id da opcao correta*/
        $resultado = 0;/*resultado começa falso*/

        foreach ($per->Opcoes as $key => $value) {
                
                if($value->correta ==1){
                    $id_correta = $value->id;
                }
        }

        $pontuacao = new Pontuacao();
        $pontuacao->users_id = \Auth::user()->id;
        $pontuacao->perguntas_temas_id = $request->pergunta_temas_id;
        $pontuacao->temas_id = $request->tema_id;
        
        if($op->correta == 1){
            $pontuacao->ponto = 10;/*mudar depois*/
            $pontuacao->acertou = 1;

            $resultado = 1;
        }else{
            $pontuacao->ponto = 0;/*mudar depois*/
            $pontuacao->acertou = 0;
        }

        //dd($id_correta);
        $pontuacao->save();

        $retorno = [
            'id_correta'=>$id_correta,
            'resultado'=>$resultado,
        ];

        return json_encode($retorno);

    }

  
    public function resetarTema($id)
    {
        $tema = Tema::find($id);
        $temas_placar = Temas_placar::where('users_id', '=', \Auth::user()->id, 'AND')
                                    ->where('temas_id', '=', $id, 'AND')
                                    ->first();

        if(!empty($tema->id)){
            

            if(!empty($temas_placar)){
                $temas_placar->status = "Aberto";
                $temas_placar->etapa= 0;
                $temas_placar->porcentagem = 0;
                $temas_placar->update();

            }else{
                return redirect('/')->with('erro','Nenhum tema encontrado!');
            }

            //dd(\Auth::user()->Pontuacao($tema->id));
            foreach (\Auth::user()->Pontuacao($tema->id) as $key => $pt) {
                $excluir_pontuacao = Pontuacao::find($pt->id);
                $excluir_pontuacao->delete();
            }

            //dd($temas_placar->etapa);
             return view('tema.pergunta',
                    [
                       'tema'=>$tema,
                       'etapa'=>$temas_placar->etapa,
                    ]);

        }else{
            return redirect('/')->with('erro','Nenhum tema encontrado!');
        }
        
    }

 
    public function showPergunta($id, $etapa =null)
    {
        
        $temas_placar = Temas_placar::where('users_id', '=', \Auth::user()->id, 'AND')
                                    ->where('temas_id', '=', $id, 'AND')
                                    ->first();
        //dd($temas_placar);

        $tema = Tema::find($id);
        //dd($temas_placar);

        if(!empty($tema)){

            if(!empty($temas_placar)){

                //dd('EXISTE');

                if($temas_placar->status == "Aberto"){

                        if($temas_placar->etapa > $etapa){
                            $etapa = $temas_placar->etapa;
                        }else{
                            $temas_placar->etapa = $etapa ;
                        }
                        //dd($etapa);

                        $totalPerguntas = count($tema->PerguntasTemas);
                        $porcentagem = 100*$etapa/$totalPerguntas;

                        $temas_placar->porcentagem = $porcentagem;

                        if($totalPerguntas == $etapa){/*FINALIZA O TEMA*/

                            

                            if($temas_placar->pontos < \Auth::user()->getPontuacao($tema->id)){
                                /*so coloca os pontos se forem maiores que o anterior*/
                            
                            $temas_placar->pontos = \Auth::user()->getPontuacao($tema->id);

                            }

                            $pontuacaoAtual = \Auth::user()->getPontuacao($tema->id);
                            $temas_placar->status = "Fechado";
                            $temas_placar->update();
                            
                            return view('tema.final',
                                [   
                                    'pontuacaoAtual'=> $pontuacaoAtual,
                                    'tema' =>$tema,
                                    'pontos'=>$temas_placar->pontos,
                                    
                                ]);

                        }else{/*MANDA PRA PROXIMA PERGUNTA*/

                            $temas_placar->update();

                            return view('tema.pergunta',
                                [
                                    'tema'=>$tema,
                                    'etapa'=>$etapa,
                                ]);
                        }
                }else{
                    return redirect('/')->with('erro','Esse Tema está fechado!');
                }
                //etapa do BD é colocado na variavel etapa e redirecionado para a proxima pergunta
            }else{
                //dd('NAO EXISTE');
                //cria um novo registro no temas placar e seta a etapa como 0

                $new_temas_placar = new Temas_placar();
                $new_temas_placar->users_id = \Auth::user()->id;
                $new_temas_placar->temas_id = $id;
                $new_temas_placar->pontos = 0;
                $new_temas_placar->status = "Aberto";
                $new_temas_placar->etapa= 0;
                $new_temas_placar->porcentagem = 0;
                $new_temas_placar->save();

                $novo_etapa = 0;

                return view('tema.pergunta',
                    [
                        'tema'=>$tema,
                        'etapa'=>$novo_etapa,
                    ]);
            }

        }else{
            return redirect('/')->with('erro','Nenhum tema encontrado!');
        }
    }

    public function showPerguntaAjax($id, $etapa =null)
    {
        //dd();
        $temas_placar = Temas_placar::where('users_id', '=', \Auth::user()->id, 'AND')
                                    ->where('temas_id', '=', $id, 'AND')
                                    ->first();
        //dd($temas_placar);

        $tema = Tema::find($id);
        //dd($temas_placar);


        $temas_placar->etapa = $etapa ;
        //dd($etapa);

        $totalPerguntas = count($tema->PerguntasTemas);
        $porcentagem = 100*$etapa/$totalPerguntas;

        $temas_placar->porcentagem = $porcentagem;

            $temas_placar->update();

            $retorno = [
                    'porcentagem'=>$porcentagem,
                    'etapa'=>$etapa,
                ];
                
            return json_encode($retorno); 
                                    
    }

}
