<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;
use App\User;

class SistemaController extends Controller
{
    
    public function index()
    {
        $usuario = \Auth::user();

        if( Gate::denies('Administrador', $usuario))
        return redirect('/')->with('erro','Acesso negado!');

        return view('sistema.index');
    }

}
