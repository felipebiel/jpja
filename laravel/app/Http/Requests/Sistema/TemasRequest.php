<?php

namespace App\Http\Requests\Sistema;

use App\Http\Requests\Request;

class TemasRequest extends Request
{

    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        
        $comum = [
            'nome' =>'required',
            'input_imagem_tema' => 'required',
            'perguntas_temas' =>'required',
        ];

        $retorno = array_merge($comum);
        return $comum;
            

    }

     public function messages()/*mensagem para retornar caso a requisiçao seja falsa*/
    {
        return [
            'perguntas_temas.required'=> 'Selecione pelo menos uma pergunta para o tema.',
            'input_imagem_tema.required' => 'Selecione uma imagem para o tema.',
        ];
    }


    public function attributes(){
        return[
            /*nome do campo no formulario - como sera exibito*/
            'nome' =>'Nome',
            
        ];
    }
}
