<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Models\Pergunta;
use App\Models\Opcao;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sistema\PerguntasRequest;
use Gate;


class PerguntasController extends Controller
{
    
    public function index()
    {
       //dd('3');
       $perguntas = Pergunta::all();

        $usuario = \Auth::user();

        if( Gate::denies('Administrador', $usuario))
        return redirect('/')->with('erro','Acesso negado!');
       //dd($perguntas);
       return view('sistema/perguntas/index',['perguntas'=>$perguntas]);
    }

    
    public function create()
    {
       $usuario = \Auth::user();

        if( Gate::denies('Administrador', $usuario))
        return redirect('/')->with('erro','Acesso negado!');


       return view('sistema/perguntas/nova');
    }

    public function store(PerguntasRequest $request)
    {
       //dd($request->all());
        $pergunta = new Pergunta($request->all());
        $pergunta->save();

            if($request->tipo=='praticar'){
                      
                foreach ($request->opcoes as $key => $alternativa) {
                            
                    $opcao = new Opcao($alternativa);

                    $opcao->perguntas_id = $pergunta->id;

                    if(!empty($alternativa['correta'])){
                        $opcao->correta = 1;
                    }else{
                        $opcao->correta = 0;
                    }    

                    if(!empty($alternativa['opcao'])){
                            $opcao->save();
                    }
                }

             }

        return redirect('sistema/perguntas')->with('success','Pergunta salva com sucesso');

    }

    
    public function edit($id)
    {
     $pergunta = Pergunta::find($id);

     $usuario = \Auth::user();

     if( Gate::denies('Administrador', $usuario))
     return redirect('/')->with('erro','Acesso negado!');


     return view('sistema/perguntas/editar',['pergunta'=>$pergunta]);

    }

    
    public function update(PerguntasRequest $request, $id)
    {
        //dd($request->all());

        $pergunta = Pergunta::find($id);
        if($request->tipo_editar=='praticar'){
                      
                foreach ($request->opcoes as $key => $alternativa) {
                            
                   if (!empty($alternativa['id'])) {
                           if(!empty($alternativa['opcao'])){
                                $op = Opcao::find($alternativa['id']);/*se existir busca as informaçoes da opcao com o is*/
                                if(!isset($alternativa['correta'])){/*se o checkbox estiver vazio*/
                                    $op->correta = 0; /*sete o valor 0(false)*/
                                }else{
                                    $op->correta = 1;
                                }//senao se checkbox estiver marcado
                                $op->update($alternativa);/*altere as informaçoes*/

                           }else{
                                $op = Opcao::find($alternativa['id']);
                                $op->delete();/*delete a opcao*/
                            }
                    }else{
                        $opcao = new Opcao($alternativa);

                        $opcao->perguntas_id = $pergunta->id;

                        if(!empty($alternativa['correta'])){
                            $opcao->correta = 1;
                        }else{
                            $opcao->correta = 0;
                        } 

                        if(!empty($alternativa['opcao'])){
                                $opcao->save();
                        }    
                    }
            }
        }


       $pergunta->update($request->all());
       return redirect('sistema/perguntas')->with('success','Pergunta alterada com sucesso');
    }

   
    public function destroy($id)
    {
       
        $pergunta = Pergunta::find($id);
        
    

        foreach ($pergunta->Opcoes as $key => $opcao) {
            $opcao = Opcao::find($opcao->id);
            $opcao->delete();
            # code...
        }

        $pergunta->delete();

        return redirect('sistema/perguntas')->with('success','Pergunta excluída com sucesso');
    }
}
