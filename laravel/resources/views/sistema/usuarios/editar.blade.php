@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Novo Usuário</div>

                <div class="panel-body">
                @include('sistema.partes.mensagens')
                          
                       {!! Form::model($usuario, ['route' => ['sistema.usuarios.atualizar', $usuario->id], 'method' =>'PUT','class' => 'form-horizontal' ]) !!}
                            @include('sistema.usuarios.form')
                            {!!Form::button('Salvar <i class="fa fa-floppy-o" aria-hidden="true"></i>',['class'=>'btn btn-success', 'type'=>'submit'])!!}
                            <a  class=" btn btn-info" href="{{ url('sistema/usuarios')}}"> Voltar</a>
                            
                       {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

