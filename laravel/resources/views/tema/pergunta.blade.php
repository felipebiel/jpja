@extends('layouts.perguntas')

@section('titulo')

@endsection

@section('content')


<div class="container" id="corpo_perguntas">
	<header class="row">
		<div class="col-md-10 col-md-offset-1" style="padding-top: 20px; padding-bottom: 20px;">
			<?php 
				$totalPerguntas = count($tema->PerguntasTemas);
				
				$porcentagem = (100*$etapa)/$totalPerguntas;

			?>
		<div class="progress progress-striped">
		    <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
		        <span>{{round($porcentagem)}}</span> %
		    </div>
		</div>
	</header>

	
	<main class="row">
		
		<div class="col-md-12 pergunta">
			{!! $tema->PerguntasTemas[$etapa]->Pergunta->pergunta !!}
		</div>
	

		<div class="col-md-10 col-md-offset-1 col-xs-12">
		{!! Form::open(['route' => 'painel.tema.checarResposta' , 'id'=>'checarResposta', 'method'=>'POST']) !!}
			<div class="row">
			@foreach($tema->PerguntasTemas[$etapa]->Pergunta->Opcoes as $key => $opcao)

				<div class="col-md-3 col-xs-6 col-sm-3">
					<div class="well well-sm"> 	
						<center>	
							<input type="radio" name="op[]" class="verifica" value="{{$opcao->id}}" id="op-{{$key}}">
							<label for="op-{{$key}}">{{$opcao->opcao}}</label>
						</center>
					</div>
				</div>

			@endforeach	
			</div>
			
			{!! Form::hidden('tema_id',$tema->id) !!}
			{!! Form::hidden('pergunta_id',$tema->PerguntasTemas[$etapa]->Pergunta->id) !!}
			{!! Form::hidden('pergunta_temas_id',$tema->PerguntasTemas[$etapa]->id) !!}
			<input type="hidden" name="opcao" >
		{{Form::close()}}

			
		</div>

	</main>

	<footer class="row" >

		

		<div class="col-md-8 col-md-offset-1 col-sm-8">
			<h2 class="mensagem">Selecione umas das opções.</h2>
		</div>

			
		
		<div class="col-md-3 col-sm-4">
			<center>
				<a href="{{ route('painel.tema.index', ['id' => $tema]) }}" class="btvoltarr voltar">
				<i class="fa fa-home" aria-hidden="true"></i> Voltar</a>
				<a href="" class="btcomecarvoltar prosseguir disabled ocultar">
				<i class="fa fa-fast-forward" aria-hidden="true"></i> Prosseguir</a>
			</center>
		</div>
	</footer>

</div>

<div id="alerts">
	
</div>
@endsection

@push('scriptTela')
	<script type="text/javascript">

	$(document).ready(function(){
		$(".container").hide(0).delay(300).fadeIn("slow");

		$(".progress-bar").animate({/*animando a barra de progresso*/
    		width: "{{$porcentagem}}%"
		}, 1500);

	});
		

		function checarResposta(){
			var a = $('input[name="op[]"]:checked').val();
			/*checar a resposta*/
			$('input[name="opcao"]').val(a);
			$("input[type='radio']").attr("disabled",true);
			$.ajax({
		        type: 'post',
		        url: '{{ route("painel.tema.checarResposta") }}',
		        dataType: 'json',
				data: $("#checarResposta").serialize(), // serializes the form's elements.
		   	}).done( function( data, textStatus, jqXHR ) {
				
					 $('input:radio').each(function () {
					 		var id = "#"+$(this).attr('id')+" + label";

					 		if($(this).val() == data.id_correta){
					 			$(id).addClass('verde');
					 		}else{
					 			$(id).addClass('vermelho');
					 		}
				       });

					 if(data.resultado){
					 	//acertou
					 	$('footer').addClass('verde');
					 	$('footer .mensagem').html('<i class="fa fa-smile-o" aria-hidden="true"></i> Acertou!')

					 }else{
					 	$('footer').addClass('vermelho');
					 	$('footer .mensagem').html('<i class="fa fa-times" aria-hidden="true"></i> Errou! Tente novamente.')
					 }

					$('.abrirModal').click();
					$('.prosseguir').removeClass('disabled');
					$('.prosseguir').removeClass('ocultar');
					$('.voltar').addClass('disabled');

			}).fail( function( jqXHR ) {
				//$("input[type='radio']").attr("disabled",true);
			    $('#alerts').html(jqXHR.responseText);
				
			});

			/*setar a proxima etapa*/	
			$.ajax({
		        type: 'get',
		        url: '{{route('painel.tema.perguntaAjax', ['id' => $tema, 'etapa' =>$etapa+1])}}',
		        dataType: 'json',
				 // serializes the form's elements.
		   	}).done( function( data, textStatus, jqXHR ) {
				console.log(data);
				$('.prosseguir').attr('href','{{ url('painel/tema/pergunta').'/'.$tema->id}}/'+data.etapa);
				var porcentagem = data.porcentagem+'%';
				$('.progress-bar span').empty();

				var perc = Math.round(parseFloat(data.porcentagem));
				console.log(perc);

				$('.progress-bar span').text(perc);
				$(".progress-bar").animate({/*animando a barra de progresso*/
    				width: porcentagem
				}, 100);

			}).fail( function( jqXHR ) {
				//$("input[type='radio']").attr("disabled",true);
			    $('#alerts').html(jqXHR.responseText);
				
			});		
		}


		$(document).on('click', '.verifica', function(){

			checarResposta();

		});



	</script>

@endpush