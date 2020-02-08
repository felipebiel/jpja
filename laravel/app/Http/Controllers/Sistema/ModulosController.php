<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Modulo;
use App\Models\Tema;
use App\Models\Modulos_tema;
use App\Http\Requests\Sistema\ModulosRequest;
use Gate;

class ModulosController extends Controller
{
    
    public function index()
    {
        $modulos = Modulo::all();
        /*regra de acesso*/
        $usuario = \Auth::user();

        if( Gate::denies('Administrador', $usuario))
        return redirect('/')->with('erro','Acesso negado!');

        return view('sistema.modulos.index', ['modulos'=>$modulos]);
    }

   
    public function create()
    {
        $usuario = \Auth::user();

        if( Gate::denies('Administrador', $usuario))
        return redirect('/')->with('erro','Acesso negado!');

        return view('sistema.modulos.novo');
    }

    
    public function store(ModulosRequest $request)
    {
        if(\Request::ajax()){
           return 1;
        }else{
            
            //dd($request->all());
            $modulo = new Modulo($request->all());

            $destinationPath = 'arquivos/img_modulos/';/*destino das imagens do quiz*/
            date_default_timezone_set("Brazil/East");//timezone brasil
            $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
            $new_name = 'modulo-' . date("Ymd-His"). '-' . $ext; //Definindo um novo nome para o arquivo
            $request->file('imagem')->move($destinationPath, $new_name);//move o arquivo para o destino

            $modulo->imagem = $new_name;

            $modulo->save();

            foreach ($request->modulos_temas as $key => $modulo_tema) {//salva as perguntas temas
                //dd($modulo_tema['id']);
                $mod_tem = new Modulos_tema();
                $mod_tem->modulos_id = $modulo->id;
                $mod_tem->temas_id = $modulo_tema['id'];
                $mod_tem->save();
            }

            return redirect('sistema/modulos')->with('success', 'Modulo salvo com sucesso.');
        }
    }

    
    public function temas(){

        $tema_temp = Tema::all();

        $tema = [];

        foreach ($tema_temp as $key => $value) {
            array_push($tema , [strip_tags($value)]);
        }

        return json_encode($tema);

    }

    
    public function edit($id)
    {
        $modulo = Modulo::find($id);

        $usuario = \Auth::user();

        if( Gate::denies('Administrador', $usuario))
        return redirect('/')->with('erro','Acesso negado!');

    
        return view('sistema/modulos/editar',['modulo'=>$modulo]);
    }

    public function update(ModulosRequest $request, $id)
    {
        if(\Request::ajax()){
           return 1;
        }else{
            
            //dd($request->all());
            $modulo = Modulo::find($id);

            if(!empty($request->imagem)){
                    \File::delete('arquivos/img_modulos/'.$modulo->imagem);

                    $destinationPath = 'arquivos/img_modulos/';/*destino das imagens do quiz*/
                    date_default_timezone_set("Brazil/East");//timezone brasil
                    $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
                    $new_name = 'modulo-' . date("Ymd-His"). '-' . $ext; //Definindo um novo nome para o arquivo
                    $request->file('imagem')->move($destinationPath, $new_name);//move o arquivo para o destino

                    $modulo->imagem = $new_name;
            }else{
                    $modulo->imagem = $request->input_imagem_modulo;
            }

            $modulo->nome = $request->nome;
            $modulo->descricao = $request->descricao;

            $modulo->update();

            $modulos_temas_banco = [];
            $modulos_temas_view = [];

            foreach ($request->modulos_temas as $key => $view) {//o que vem da view

                array_push($modulos_temas_view, $view['id']);//adiciona no array da view
            }

            foreach ($modulo->ModulosTemas as $key => $banco) {

                array_push($modulos_temas_banco, $banco->temas_id);//adiciona no array do branco
            }

            $excluir_mod_tem = array_diff($modulos_temas_banco, $modulos_temas_view);

            $adicionar_mod_tem = array_diff($modulos_temas_view, $modulos_temas_banco);

            foreach ($excluir_mod_tem as $key => $exc) {
                //dd($exc);
                $mod_tem_exc = Modulos_tema::where('temas_id', '=', $exc)->first();
                //dd($mod_tem_exc);

                $mod_tem_exc->delete();

            }

           foreach ($adicionar_mod_tem as $key => $modulo_tema) {//salva as perguntas temas
                //dd($modulo_tema['id']);
                $mod_tem = new Modulos_tema();
                $mod_tem->modulos_id = $modulo->id;
                $mod_tem->temas_id = $modulo_tema;
                $mod_tem->save();
            }

            return redirect('sistema/modulos')->with('success', 'Modulo editado com sucesso.');
        }
    }

    public function destroy($id)
    {
       $modulo = Modulo::find($id);

        if(count($modulo->ModulosTemas)>0){
            foreach ($modulo->ModulosTemas as $key => $value) {
                
                $modulos_temas = Modulos_tema::find($value->id);

                $modulos_temas->delete();
            }
        }

        \File::delete('arquivos/img_modulos/'.$modulo->imagem);
        $modulo->delete();

        return redirect('sistema/modulos')->with('success', 'Modulo excluido com sucesso.');
    }
}
