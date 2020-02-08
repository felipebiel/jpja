<?php

namespace App\Http\Requests\Sistema;

use App\Http\Requests\Request;

class ModulosRequest extends Request
{
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        
        $comum = [
            'nome' =>'required',
            'input_imagem_modulo' => 'required',
            'modulos_temas' =>'required',
        ];

        $retorno = array_merge($comum);
        return $comum;
            

    }

     public function messages()/*mensagem para retornar caso a requisiçao seja falsa*/
    {
        return [
            'modulos_temas.required'=> 'Selecione pelo menos um tema para o modulo.',
            'input_imagem_modulo.required' => 'Selecione uma imagem para o modulo.',
        ];
    }


    public function attributes(){
        return[
            /*nome do campo no formulario - como sera exibito*/
            'nome' =>'Nome',
            
        ];
    }
}
