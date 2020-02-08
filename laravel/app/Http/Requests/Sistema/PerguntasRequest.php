<?php

namespace App\Http\Requests\Sistema;

use App\Http\Requests\Request;

class PerguntasRequest extends Request
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        
        $comum = [
            'pergunta' =>'required',
        ];

        //dd($this->all());
        $rules_editar = [];

        if($this->method=='POST') {
            $rules_editar = [
                'tipo' => 'required',
                'resposta'=>'required_if:tipo,exercicios',
                ];
            
        }else{
            $rules_editar = [
                'tipo_editar' => 'required',
                'resposta'=>'required_if:tipo_editar,exercicios',
                ];
        }

        $cont = 0;
        $correta = false;

        foreach ($this->opcoes as $value) {

            if(!empty($value['opcao'])){
                 $cont +=1;

                 if(isset($value['correta'])){
                    $correta = true;
                 }
            }
        }

        $opcoes = [];
        $rules_correta = [];

            if($cont>0){
                $opcoes = [];

            }else{
                $opcoes = [
                    'alternativas'=>'required_if:tipo,praticar',
                ];                
            }

            if(!$correta){
                $rules_correta = [
                    'correta' =>'required_if:tipo,praticar',
                ];
            }
                


        $retorno = array_merge($comum,$opcoes,$rules_correta,$rules_editar);
        return $retorno;
            

    }

     public function messages()/*mensagem para retornar caso a requisiçao seja falsa*/
    {
        return [
            'correta.required_if'=> 'Selecione pelo menos uma alternativa como correta.',
            'alternativas.required_if' => 'Coloque no minimo uma alternativa.',
        ];
    }


    public function attributes(){
        return[
            /*nome do campo no formulario - como sera exibito*/
            'tipo_editar' =>'Tipo',
            'pergunta' => 'Pergunta',
            'tipo' => 'Tipo',
            'alternativas'=>'Alternativas',
            'resposta'=>'Resposta',
        ];
    }
}
