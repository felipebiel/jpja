@extends('layouts.perguntas')

@section('titulo')

@endsection

@section('content')

<style type="">

.fundobrancodotema{
background-color: #ececec;

height: 100%;


}



.btctema {

		  background: #33ff14;
		  background-image: -webkit-linear-gradient(top, #33ff14, #42b82b);
		  background-image: -moz-linear-gradient(top, #33ff14, #42b82b);
		  background-image: -ms-linear-gradient(top, #33ff14, #42b82b);
		  background-image: -o-linear-gradient(top, #33ff14, #42b82b);
		  background-image: linear-gradient(to bottom, #33ff14, #42b82b);
		  -webkit-border-radius: 28;
		  -moz-border-radius: 28;
		  border-radius: 28px;
		  text-shadow: 1px 1px 3px #ffdeff;
		  font-family: Arial;
		  color: #ffffff;
		  font-size: 21px;
		  padding: 8px 38px 8px 30px;
		  border: solid #75eb6f 1px;
		  text-decoration: none;
}

.btctema:hover {
			
		  color:green; 
		  background: #56fc3c;
		  background-image: -webkit-linear-gradient(top, #56fc3c, #34d976);
		  background-image: -moz-linear-gradient(top, #56fc3c, #34d976);
		  background-image: -ms-linear-gradient(top, #56fc3c, #34d976);
		  background-image: -o-linear-gradient(top, #56fc3c, #34d976);
		  background-image: linear-gradient(to bottom, #56fc3c, #34d976);
		  text-decoration: none;
}

.btvtema {
  background: #efffed;
  background-image: -webkit-linear-gradient(top, #efffed, #fafafa);
  background-image: -moz-linear-gradient(top, #efffed, #fafafa);
  background-image: -ms-linear-gradient(top, #efffed, #fafafa);
  background-image: -o-linear-gradient(top, #efffed, #fafafa);
  background-image: linear-gradient(to bottom, #efffed, #fafafa);
  -webkit-border-radius: 42;
  -moz-border-radius: 42;
  border-radius: 42px;
  -webkit-box-shadow: 0px 1px 3px #8f8f8f;
  -moz-box-shadow: 0px 1px 3px #8f8f8f;
  box-shadow: 0px 1px 3px #8f8f8f;
  font-family: Arial;
  color: #56c441;
  font-size: 20px;
  padding: 8px 36px 8px 32px;
  border: solid #f0f0f0 1px;
  text-decoration: none;
}

.btvtema:hover {
  background: #47f02d;
 background: #47f02d;
  background-image: -webkit-linear-gradient(top, #47f02d, #2bb847);
  background-image: -moz-linear-gradient(top, #47f02d, #2bb847);
  background-image: -ms-linear-gradient(top, #47f02d, #2bb847);
  background-image: -o-linear-gradient(top, #47f02d, #2bb847);
  background-image: linear-gradient(to bottom, #47f02d, #2bb847);
  text-decoration: none;
  -webkit-border-radius: 42;
  -moz-border-radius: 42;
  border-radius: 42px;
  -webkit-box-shadow: 0px 1px 3px #8f8f8f;
  -moz-box-shadow: 0px 1px 3px #8f8f8f;
  box-shadow: 0px 1px 3px #8f8f8f;
  color: white;
}


.epcs{

margin-bottom: 20px;


}

.ajustedomenumobille{
border-top: 2px;
border-color: solid #ff7777;
height: 50px;
background-color: white;
background-color:rgba(255,255,255,0.8);
box-shadow: #ff9292 0px -1px 4px 1px;


}

.regularfonte{
font-size: 12px;
}

.desbugdopainel{
height: 50px;

}



</style>


<main class="fundobrancodotema ">
	
	<div class="container">	

		<div class="panel panel-default">

     		<div class="panel-heading aumentarpt">

		  			<center>

						<div class="row">

								<div class="col-md-12 col-sm-12">
									
									<h1 class="">{{$tema->nome}}</h1>

									@if(!empty($temas_placar))

									PONTOS : {{ $temas_placar->pontos}}

									@endif
								</div>
								
						</div>
				
						<br>
								
								
						<div class="col-md-12 col-sm-12 epcs">

							<div class="row">

								<div class="col-md-6 col-sm-6 desbugdopainel">
										
									<a class="btvtema" href="{{ url('/painel')}}"><i class="fa fa-home" aria-hidden="true"></i> Retornar</a>

								</div>
											


																	
								<div class="col-md-6 col-sm-6 desbugdopainel">

									@if($etapa == 0)

										<a href="{{ route('painel.tema.pergunta', ['id' => $tema, 'etapa' =>$etapa]) }}" class="btctema">
										<i class="fa fa-play" aria-hidden="true"></i> Começar</a>

									@elseif($etapa>0 && $temas_placar->status=="Aberto")

										<a href="{{ route('painel.tema.pergunta', ['id' => $tema, 'etapa' =>$etapa]) }}" class="btctema">
										<i class="fa fa-play" aria-hidden="true"></i> Continuar</a>

									@elseif($etapa>0 && $temas_placar->status=="Fechado")
										
										<a href="{{ route('painel.tema.resetar', ['id' => $tema->id]) }}" class="btctema">
										<i class="fa fa-repeat" aria-hidden="true"></i> Resetar o tema</a>

									@endif

								</div>

							</div>
								
						</div>

					</center>	

		 	</div>

		  	<div class="panel-body">
		
					<center>

						<h2>Descrição</h2>
					
					</center>

					<p>{!!$tema->descricao!!}</p>
					<br>
			<center>
	
				@if($etapa == 0)
				<a href="{{ route('painel.tema.pergunta', ['id' => $tema, 'etapa' =>$etapa]) }}" class="btctema">
				<i class="fa fa-play" aria-hidden="true"></i> Começar</a>

				@elseif($etapa>0 && $temas_placar->status=="Aberto")
				<a href="{{ route('painel.tema.pergunta', ['id' => $tema, 'etapa' =>$etapa]) }}" class="btctema">
				<i class="fa fa-play" aria-hidden="true"></i> Continuar</a>

				@elseif($etapa>0 && $temas_placar->status=="Fechado")
				<a href="{{ route('painel.tema.resetar', ['id' => $tema->id]) }}" class="btctema">
				<i class="fa fa-repeat" aria-hidden="true"></i> Resetar o tema</a>
				@endif

			</center>

		</div>

	</div>

</div>


</div>
</main>
@endsection