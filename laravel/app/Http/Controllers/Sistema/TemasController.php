<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tema;
use App\Models\Pergunta;
use App\Models\Perguntas_tema;
use App\Http\Requests\Sistema\TemasRequest;
use Gate;

class TemasController extends Controller
{

    public function index()
    {
        $temas = Tema::all();

        $usuario = \Auth::user();

        if( Gate::denies('Administrador', $usuario))
        return redirect('/')->with('erro','Acesso negado!');

        return view('sistema.temas.index', ['temas'=>$temas]);
    }

    
    public function create()
    {
        $usuario = \Auth::user();

        if( Gate::denies('Administrador', $usuario))
        return redirect('/')->with('erro','Acesso negado!');
        
        return view('sistema.temas.novo');
    }

    
    public function store(TemasRequest $request)
    {
        if(\Request::ajax()){
           return 1;
        }else{
            
            //dd($request->all());
            $tema = new Tema($request->all());

            $destinationPath = 'arquivos/img_temas/';/*destino das imagens do quiz*/
            date_default_timezone_set("Brazil/East");//timezone brasil
            $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
            $new_name = 'tema-' . date("Ymd-His"). '-' . $ext; //Definindo um novo nome para o arquivo
            $request->file('imagem')->move($destinationPath, $new_name);//move o arquivo para o destino

            $tema->imagem = $new_name;

            $tema->save();

            foreach ($request->perguntas_temas as $key => $pergunta_tema) {//salva as perguntas temas
                //dd($pergunta_tema['id']);
                $per_tem = new Perguntas_tema();
                $per_tem->temas_id = $tema->id;
                $per_tem->perguntas_id = $pergunta_tema['id'];
                $per_tem->save();
            }

            return redirect('sistema/temas')->with('success', 'Tema salvo com sucesso.');
        }
    }

    public function edit($id)
    {
        $tema = Tema::find($id);

        $usuario = \Auth::user();

        if( Gate::denies('Administrador', $usuario))
        return redirect('/')->with('erro','Acesso negado!');

        return view('sistema.temas.editar', ['tema' =>$tema]);
    }

    public function update(TemasRequest $request, $id)
    {
        if(\Request::ajax()){
           return 1;
        }else{
            
            //dd($request->all());
            $tema = Tema::find($id);

            if(!empty($request->imagem)){
                    \File::delete('arquivos/img_temas/'.$tema->imagem);

                    $destinationPath = 'arquivos/img_temas/';/*destino das imagens do quiz*/
                    date_default_timezone_set("Brazil/East");//timezone brasil
                    $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
                    $new_name = 'tema-' . date("Ymd-His"). '-' . $ext; //Definindo um novo nome para o arquivo
                    $request->file('imagem')->move($destinationPath, $new_name);//move o arquivo para o destino

                    $tema->imagem = $new_name;
            }else{
                    $tema->imagem = $request->input_imagem_tema;
            }

            $tema->nome = $request->nome;
            $tema->descricao = $request->descricao;

            $tema->update();

            $perguntas_temas_banco = [];
            $perguntas_temas_view = [];

            foreach ($request->perguntas_temas as $key => $view) {//o que vem da view

                array_push($perguntas_temas_view, $view['id']);//adiciona no array da view
            }

            foreach ($tema->PerguntasTemas as $key => $banco) {

                array_push($perguntas_temas_banco, $banco->perguntas_id);//adiciona no array do branco
            }

            $excluir_per_tem = array_diff($perguntas_temas_banco, $perguntas_temas_view);

            $adicionar_per_tem = array_diff($perguntas_temas_view, $perguntas_temas_banco);

            foreach ($excluir_per_tem as $key => $exc) {
                //dd($exc);
                $per_tem_exc = Perguntas_tema::where('perguntas_id', '=', $exc)->first();
                //dd($per_tem_exc);

                $per_tem_exc->delete();

            }

           foreach ($adicionar_per_tem as $key => $pergunta_tema) {//salva as perguntas temas
                //dd($pergunta_tema['id']);
                $per_tem = new Perguntas_tema();
                $per_tem->temas_id = $tema->id;
                $per_tem->perguntas_id = $pergunta_tema;
                $per_tem->save();
            }

            return redirect('sistema/temas')->with('success', 'Tema editado com sucesso.');
        }
    }

    public function destroy($id)
    {
        $tema = Tema::find($id);

        if(count($tema->PerguntasTemas)>0){
            foreach ($tema->PerguntasTemas as $key => $value) {
                
                $pergunta_tema = Perguntas_tema::find($value->id);

                $pergunta_tema->delete();
            }
        }

        \File::delete('arquivos/img_temas/'.$tema->imagem);
        $tema->delete();

        return redirect('sistema/temas')->with('success', 'Tema excluido com sucesso.');
    }

    public function perguntas(){

        $pergunta_temp = Pergunta::all();

        $pergunta = [];

        foreach ($pergunta_temp as $key => $value) {
            array_push($pergunta , [strip_tags($value)]);
        }

        return json_encode($pergunta);

    }
}
