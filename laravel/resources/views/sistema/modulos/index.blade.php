@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Listas de modulos</div>

                <div class="panel-body">
                      <a href="{{url('sistema/modulos/nova')}}" class="btn btn-primary">Cadastrar modulo</a>
                      <p></p>

                        @include('sistema.partes.mensagens')
                        
                       @if(count($modulos)==0)
                            <div class="alert alert-warning" role="alert">
                        
                                <strong>Atenção!</strong> Ainda não existem modulos cadastrados.
                            </div>   
                        @else
                        
                        <table class='table table-bordered table-hover'>
                            <tr>
                                <th>MODULO</th>
                                <th>AÇÕES</th>
                            </tr>

                            @foreach($modulos as $modulo)
                                
                                <tr>
                                    <td>{!!$modulo->nome!!}</td>
          
                                    <td>

                                    {!! Html::decode(link_to_route('sistema.modulos.editar' , $title = '<i class="fa fa-pencil fa-lg" aria-hidden="true"></i></i>' , $parameter = $modulo, $attributes = ['class' =>'btn btn-primary' , 'title'=>'Editar'])) !!}


                                    {{ Form::open(['route' => ['sistema.modulos.excluir', $modulo->id],'method' => 'DELETE', 'class'=>'fixForm']) }} 
                                    
                                        {!! Form::button('<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></i>', array('class' => 'btn btn-danger', 'onclick'=>'javascript:return confirm(\'Tem certeza que deseja excluir este modulo?\')', 'type'=>'submit', 'title'=>'Excluir' )) !!} 

                                    {{ Form::close() }}
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
