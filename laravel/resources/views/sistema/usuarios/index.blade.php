@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Listas de usuários</div>

                <div class="panel-body">
                      <a href="{{url('sistema/usuarios/nova')}}" class="btn btn-primary">Cadastrar novo usuário</a>
                      <p></p>

                        @include('sistema.partes.mensagens')
                        
                       @if(count($usuarios)==0)
                            <div class="alert alert-warning" role="alert">
                        
                                <strong>Atenção!</strong> Ainda não existem usuários cadastrados.
                            </div>   
                        @else
                        
                        <table class='table table-bordered table-hover'>
                            <tr>
                                <th>NOME</th>
                                <th>E-MAIL</th>
                                <th>AÇÕES</th>
                            </tr>

                            @foreach($usuarios as $usuario)
                                
                                <tr>
                                    <td>{!!$usuario->name!!}</td>
                                    <td>{!!$usuario->email !!}</td>
          
                                    <td>

                                    {!! Html::decode(link_to_route('sistema.usuarios.editar' , $title = '<i class="fa fa-pencil fa-lg" aria-hidden="true"></i></i>' , $parameter = $usuario, $attributes = ['class' =>'btn btn-primary' , 'title'=>'Editar'])) !!}
                                    </td>

                                </tr>

                            @endforeach

                            @endif

                        </table>
                    
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
