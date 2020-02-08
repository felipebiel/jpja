@extends('layouts.site')

@section('titulo')

@endsection

@section('content')

<style type="">
	

.fundobrancodosite{
background-color: #ececec;

}

.formatacaodopainel{

border-radius: 5px;
box-shadow: #b5b2b2 1px 2px 2px;

}


.fontedotitulo{

font-family: Showcard Gothic;
color: black;
text-align: center;
}

.perfildousuario{

height: 200px;

}

.espacamentoicone{

margin: 8px;

}

.centralizaricones{
text-align: center;

}

.menusdoperfil{
margin-top: 10px;
left: 6px;

}

.nivelarnome{
margin-top: 10px;

}

.ajustedonome{
text-align: center;
padding-top: 25px;


}

.ajustedobotaoeditar{

padding-left:22px;

}

.ajustedomenumobille{
border-top: 2px;
border-color: solid #ff7777;
height: 50px;
background-color: white;
background-color:rgba(255,255,255,0.8);
box-shadow: #ff9292 0px -1px 4px 1px;


}


.epc{
	box-shadow: red 0px 0px 0px 0px;

}

.queijo{

height: 50px;

}

.pequenamarginnomenu{

	margin-top: 3px;
}

/*CSS DO PROGRESS BAR REDONDO*/
.circle {
  position: relative;
  width: 90px;
  height: 90px;
  margin: 0 auto;
}
  
  .circle img {
    width: 90px;
    height: 90px;
    vertical-align: top;
    border-radius: 50%;
  }
  
  .circle canvas {
    position: absolute;
    left: 0;
    top: 0;
  }


</style>


<main class="fundobrancodosite">

		<!-- Menu inferior da versão mobille -->

		<div class="container-fixed menumobille">
			<nav class="nav navbar-defaut navbar-fixed-bottom ajustedomenumobille">
				<div class="container">
					<div class="row">
						<center class="pequenamarginnomenu">

							<div class="col-xs-4">

								<a href="">
									<img  src="{{ url('arquivos/imagens/gp.png')}}" width="42"></a>
								</a>

							</div>

							<div class="col-xs-4">

								<a href="{{ url('/painel') }}">
									<img src="{{ url('arquivos/imagens/torii.png')}}" width="42"></a>
								</a>

							</div>

							<div class="col-xs-4">

								<a href="">
									<img src="{{ url('arquivos/imagens/pagoda.png')}}" width="42"></a>
								</a>

							</div>		
						</center>	
					</div>
				</div>
			</nav>
		</div>

		<!--  Codigo da versão desktop/tablet -->

	<div class="container espacamentotopo">
		
		<div class="row">		

			<!-- A primeira div são os paineis de perfil e extras com twitter/facebook -->

			<div class="col-md-4 col-md-push-8 col-sm-4 col-sm-push-8">
					
				<div class="row">

					<div class="col-md-12 paineldeperfildousuario">

						<div class="panel panel-default">
								
							<div class="panel-body perfildousuario">
								
								<div class="row">
									
									<div class="col-md-12">
									
										<div class="row">
											
											<div class="col-md-4 col-sm-4">
											
												<img src="{{ url('arquivos/imagens/geisha.png')}}" width="80">
																								

												<a class="ajustedobotaoeditar" href="">Editar</a>

											</div>
											
											<div class="col-md-8 col-sm-8 ajustedonome">
											
												OLA! {{ strtoupper(Auth::user()->name)}}

											</div>

										</div>
										
									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="col-md-12 paineldeperfildousuario">
							
						<div class="panel panel-default ">
								
							<div class="panel-body">
									
								<div class="row">

									<center>								
									
										<a class="espacamentoicone" href="{{ url('#') }}">
			                    			<img src="{{ url('arquivos/imagens/facebook.png')}}" width="40">
			                			</a>

			                			<a class="espacamentoicone" href="{{ url('#') }}">
			                    			<img src="{{ url('arquivos/imagens/twitter.png')}}" width="40">                 			
			               				</a>

										<a class="espacamentoicone" href="{{ url('#') }}">
			                    			<img src="{{ url('arquivos/imagens/google-plus.png')}}" width="40">                 			
			               				</a>

			               			</center>

								</div>

           					 </div>

						</div>

					</div>

				</div>

			</div>	

			<!-- essa div é o painel principal onde estão os módulos e temas -->

			<div class="col-md-8 col-md-pull-4 col-sm-8 col-sm-pull-4">
			
				@foreach($modulos as $modulo)

					<div class="panel panel-default">
							
						<div class="panel-heading">

							<div class="fontedotitulo">

								<img src="{{url('arquivos/img_modulos').'/'.$modulo->imagem}}" width="40" href="">

									<br>	

								    {{$modulo->nome}}

							</div>

						</div>

						<div class="panel-body">

							@foreach($modulo->ModulosTemas as $key => $modulo_tema)
								
								<div class="col-md-3 col-sm-3 centralizaricones">
									
									<a href="{{ url('painel/tema').'/'.$modulo_tema->Tema['id']}}">

									<div class="circle" id="{{$modulo_tema->Tema['id']}}" data-perc="{{\Auth::user()->getPorcentagem($modulo_tema->Tema['id'])}}">
									    <img src="{{url('arquivos/img_temas').'/'.$modulo_tema->Tema['imagem']}}" >
									    	
									</div>	

									</a>
									
										<div class="centralizaricones">

											{{$modulo_tema->Tema['nome']}}<br>
											{{\Auth::user()->getPorcentagem($modulo_tema->Tema['id'])}} % <br>
											{{\Auth::user()->getPontuacaoTotal($modulo_tema->Tema['id'])}} pontos

						

										</div>

									<br>

								</div>
										
							@endforeach

						</div>

					</div>

				@endforeach
			<div class="queijo"></div>
			</div>

		</div>

	</div>

</main>



@endsection

<!-- SCRIPT PARA A BARRA DE PROGRESSO REDONDA-->
@push('scriptTela')

<script src="{{ url('js/jquery-cicle-progress-bar/circle-progress.min.js') }}"></script>
<script type="text/javascript">
//LINk: https://github.com/kottenator/jquery-circle-progress

//exemplo : http://jsbin.com/pofobe/9/edit?html,css,js,console,output


  	$(document).ready(function(){


  		$( ".circle" ).each(function() {
    			var idTema = '#'+$(this).attr('id');
    			var pecr = $(this).attr('data-perc');

    			if(pecr<100){
    				pecr = "0."+pecr;
    			}else{
    				pecr = 1;
    			}

    			console.log(pecr);

    			$(idTema).circleProgress({
				    size: 90,/*tamanho do circulo*/
				    thickness: 5,/*Espessura da barra*/
				    value: pecr,/*valor da barra vai de 0.0(vazia) ate 1(cheia)*/
				    //fill: { color: 'red' }
				    fill: {/*fill a cor da barra , pode ter gradient*/
		      				gradient: ["#00BFFF", "blue"]
		      				
		   			}
				});
  			});

  	});

</script>
@endpush

