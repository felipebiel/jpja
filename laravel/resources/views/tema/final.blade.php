@extends('layouts.perguntas')

@section('titulo')

@endsection

@section('content')

<div class="container" id="corpo_perguntas">
	<header class="row">
		<div class="col-md-10 col-md-offset-1"">
			<center><h1>{{$tema->nome}}</h1></center>
		</div>
	</header>

	
	<main class="row">
		
		<center>
		 <img src="{{url('arquivos/img_temas').'/'.$tema->imagem}}"  class="img_final">

		<h2>Parabéns você finalizou esse tema!</h2>
		<h2>Pontuação feita: {{$pontuacaoAtual}}</h2>
		<h2>Pontuação anterior: {{$pontos}}</h2>	
		
		<p></p>	
		</center>

	</main>

	<footer class="row" >			
		<a href="{{ route('painel.tema.index', ['id' => $tema->id]) }}" class="btn btn-success btvoltarr" >
		<i class="fa fa-home" aria-hidden="true"></i> Voltar</a>
	</footer>


	<div class="container">
	

@endsection