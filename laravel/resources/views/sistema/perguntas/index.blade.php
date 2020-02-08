@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Listas de Perguntas</div>

                <div class="panel-body">
                      <a href="{{url('sistema/perguntas/nova')}}" class="btn btn-primary">Cadastrar pergunta</a>
                      <p></p>

                        @include('sistema.partes.mensagens')
                        
                       @if(count($perguntas)==0)
                            <div class="alert alert-warning" role="alert">
                        
                                <strong>Atenção!</strong> Ainda não existem perguntas cadastradas.
                            </div>   
                        @else
                        
                        <table class='table table-bordered table-hover'>
                            <tr>
                                <th>PERGUNTA</th>
                                <th>TIPO</th>
                                <th>AÇÕES</th>
                            </tr>

                            @foreach($perguntas as $pergunta)
                                
                                <tr>
                                    <td>{!!$pergunta->pergunta!!}</td>

                                    <td>{!!$pergunta->tipo!!}
                                        @if($pergunta->tipo=="exercicios")
                                        <p>Resposta: {!! $pergunta->resposta !!}</p>
                                        @endif
                                    </td>

             
                                    <td>

                                    {!! Html::decode(link_to_route('sistema.perguntas.editar' , $title = '<i class="fa fa-pencil fa-lg" aria-hidden="true"></i></i>' , $parameter = $pergunta, $attributes = ['class' =>'btn btn-primary' , 'title'=>'Editar'])) !!}


                                    {{ Form::open(['route' => ['sistema.perguntas.excluir', $pergunta->id],'method' => 'DELETE', 'class'=>'fixForm']) }} 
                                    
                                        {!! Form::button('<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></i>', array('class' => 'btn btn-danger', 'onclick'=>'javascript:return confirm(\'Tem certeza que deseja excluir esta pergunta?\')', 'type'=>'submit', 'title'=>'Excluir' )) !!} 

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
