<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\UsuariosRequest;
use App\User;
use App\Models\Modulo;
use App\Models\Entidade;

class UsuariosController extends Controller
{
    
    public function index()
    {
        $modulos = Modulo::all();
        dd($modulos);

        return view('usuarios.painel', ['modulos'=>$modulos]);
        
    }

   
    public function create()
    {
        //
    }

    
    public function store(UsuariosRequest $request)
    {
        //dd($request->all());

        $usuario = new User($request->all());
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        $entidade = new Entidade();
        $entidade->users_id = $usuario->id;
        $entidade->tipo = "Usuario";
        $entidade->save();

        \Auth::login($usuario);//loga o usuario

        return redirect('/painel');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
