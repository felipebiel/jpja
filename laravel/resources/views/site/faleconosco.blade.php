@extends('layouts.site')

@section('titulo')
    Bem vindo a Jp Já
@endsection


@section('content')

<style>



</style>



<main class="index">

         
    <div class="container espacamentotopo">

        {!! Form::open(['route' => 'registrar', 'class'=>'formulariosclm', 'id'=>'formcadastro']) !!}

            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 fundobranco">
            
                    
                     <h1><center> Fale Conosco </center></h1>
                    
                    
                    <p id="textodofaleconosco">Para dúvidas, sugestões ou quer relatar algum erro, entre em contato, sua opinião é muito importante! </p>
                    
                    <p>

                    {!!Form::label('name','Nome')!!}
                    {!!Form::text('name',null,['class'=>'form-control'])!!}

                    </p>
                
            
                    <p>

                    {!!Form::label('email','Email')!!}
                    {!!Form::text('email',null,['class'=>'form-control'])!!}
                        
                    </p>
            
            
                    <p>
                        {!!Form::label('mensagem','Mensagem')!!}
                        {!!Form::textarea('mensagem',null,['class'=>'form-control','placeholder'=>'digite sua mensagem'])!!}

                    </p>
                      
                    <div class="row">
                        <div class="col-md-2 col-md-offset-4 col-xs-4 col-xs-offset-2 col-sm-4 col-sm-offset-2">
                            <button href="{{url('/projeto') }}" type="button" class="btn btn-primary">Voltar</button>
                        </div>
                        <div class="col-md-2 col-xs-4 com-sm-4">
                            <button type="button" class="btn btn-primary" >Enviar</button>
                        </div>
                    </div>
                </div>
            </div>

        {!! Form::close() !!}

    </div> 
</main>

@endsection
