
@extends('layouts.site')

@section('titulo')
    Bem vindo a Jp Já
@endsection


@section('content')


<main class="index">

    <div class="container nivelarlogin">

		<div class="">
				
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 fundobranco">
								
								
						{!! Form::open(['url' => '/login', 'class'=>'formulariosclm', 'id'=>'formlogin']) !!}

											
							<div class="tituloformulario">
								Entrar
							</div>
							@include('site.partes.mensagens')		
											
							<p>
								{!!Form::label('email','Email')!!}
								{!!Form::text('email',null,['class'=>'form-control'])!!}
							</p>
													
							<p>
								{!!Form::label('password','Senha')!!}
								{!!Form::password('password',['class'=>'form-control'])!!}	
							</p>
							<center>

								<div class="btesqueceusuasenha">
									<a href="">Esqueceu sua senha?</a></input>	
								</div>

								<div class="espacamentodobotaoentrar">							
									<button type="submit" class="btcadastrarlogar">Entrar</button>
								</div>

							</center>
						{!! Form::close() !!}
	

				</div>
				
								
		</div>

	</div>	

</main>

@endsection