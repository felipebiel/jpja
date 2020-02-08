<?php

namespace App\Http\Requests\Sistema;

use App\Http\Requests\Request;

class UsuariosRequest extends Request
{
     public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Nome',
            'email' => 'Email',
            'password' => 'Senha',

            ];

    }

    public function messages()/*mensagem para retornar caso a requisiçao seja falsa*/
    {
        return [
            //'termos.required'=> 'Marque os termos de uso.',
        ];
    }
}
