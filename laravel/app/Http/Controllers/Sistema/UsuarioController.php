<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Sistema\UsuariosRequest;
use App\Models\Entidade;
use Gate;


class UsuarioController extends Controller
{
    
    public function index()
    {
        $usuarios_temp = User::all();

        $usuarios = [];

        foreach ($usuarios_temp as $usuario) {
            if(!empty($usuario->Entidade) && $usuario->Entidade->tipo != 'Administrador' ){
                $usuarios[] = $usuario;
            }
            
        }

        $usuario = \Auth::user();

        if( Gate::denies('Administrador', $usuario))
        return redirect('/')->with('erro','Acesso negado!');
        //dd($usuarios);

        return view('sistema.usuarios.index', ['usuarios'=>$usuarios]);

    }

   
    public function create()
    {
        $usuario = \Auth::user();

        if( Gate::denies('Administrador', $usuario))
        return redirect('/')->with('erro','Acesso negado!');

        return view('sistema.usuarios.nova');
    }

   
    public function store(UsuariosRequest $request)
    {
        //dd($request->all());

        $usuario = new User($request->all());
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        $entidade = new Entidade();
        $entidade->users_id = $usuario->id;
        $entidade->tipo = 'Usuario';
        $entidade->save();


        return redirect('sistema/usuarios')->with('success', 'Usuário salvo com sucesso.');
    }

    

    
    public function edit($id)
    {
        $usuario = User::find($id);

        $usuario = \Auth::user();

        if( Gate::denies('Administrador', $usuario))
        return redirect('/')->with('erro','Acesso negado!');

        return view('sistema.usuarios.editar', ['usuario'=>$usuario]);
    }

   
    public function update(Request $request, $id)
    {
        //
    }

}
