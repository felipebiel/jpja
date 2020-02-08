<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Entidade;

class SiteController extends Controller
{
    
    public function index()
    {
        //
    }

    

    public function cadastro()
    {
        return view('site.cadastro');
        //
    }


    public function entrar()
    {
        return view('site.login');
        //
    }

    public function regras()
    { 
        return view('site.regras');
        //
    }

    public function faleconosco()
    {
        
        return view('site.faleconosco');
        //
    }

    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
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

    /*faz o controle do tipo de usuario*/

    public function controleLogin()
    {
     //dd(\Auth::user()->Entidade->tipo);

     $usuario = \Auth::user();

        if($usuario->Entidade->tipo == "Administrador"){
            return redirect('/sistema');
        }else{
            return redirect('/painel');
        }
    }
}
