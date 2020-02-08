@extends('layouts.site')

@section('titulo')
    Bem vindo a Jp Já
@endsection


@section('content')


<main class="index">

    <div class='container espacamentotopo'>
    	<div class='row' >

			<div class='col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 fundobranco'>

				
						<!-- fundo dos formulários-->

							{!! Form::open(['route' => 'registrar', 'class'=>'formulariosclm', 'id'=>'formcadastro']) !!}
							<!-- classe de edição dos formularios cadastro/login/mensagem-->
													
									<div class="tituloformulario">
											Cadastre-se
									</div>

									@include('site.partes.mensagens')
															
									<p>
										{!!Form::label('name','Nome')!!}
										{!!Form::text('name',null,['class'=>'form-control'])!!}
									</p>
														
													
									<p>
										{!!Form::label('email','Email')!!}
										{!!Form::email('email',null,['class'=>'form-control'])!!}
									</p>
													
													
									<p>
										{!!Form::label('password','Senha')!!}
										{!!Form::password('password',['class'=>'form-control'])!!}
									</p>
															
									<p>
										{!!Form::label('password_confirmation','Confirmar Senha')!!}
										{!!Form::password('password_confirmation',['class'=>'form-control'])!!}
									</p>
															  
									<div class="textodotermos">
										<label>
											<input name="termos" value="1" type="checkbox"> Eu li e concordo com os <a href="" type="button"  data-toggle="modal" data-target="#myModal"> termos de uso. </a>

												<!-- Modal que mostra o botão termos de uso-->
											</input>
										</label>
									</div>
													
									<div class="botaocadastrar">
										<button type="submit" class="btcadastrarlogar">Cadastrar</button>
									</div>
													
							{!! Form::close() !!}

									
				</div>	
		</div>
	</div>
	
<!-- Trigger the modal with a button -->


</main>



											<div id="myModal" class="modal fade" role="dialog">
												  <div class="modal-dialog">

												    <!-- Modal content-->
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal">&times;</button>
												        <h4 class="modal-title">Termos de uso</h4>
												      </div>
												      <div class="modal-body">
												        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et augue in metus aliquet varius. Suspendisse in eleifend purus, eget rutrum nisi. Ut egestas tortor quis neque blandit aliquet. Etiam felis dolor, vehicula eget nunc id, mattis euismod sapien. Vestibulum eu nisl ac sapien efficitur mattis. Etiam luctus scelerisque sapien, non posuere erat dictum quis. Nullam ullamcorper fringilla felis, sed scelerisque ante vehicula ac. Ut sit amet ipsum nisi. Aliquam tempus lacus porta ex dignissim, sit amet lobortis dui egestas. Integer hendrerit neque et orci placerat fringilla. Curabitur ac erat tristique, bibendum urna in, rutrum mauris. Phasellus ornare turpis id ullamcorper dictum. Nullam bibendum dui odio, id hendrerit arcu tempus id. Praesent eget dictum purus. Aenean elementum leo at nibh fringilla, commodo dignissim lorem pharetra.

														Nullam nec suscipit libero, ac rhoncus nisi. Nunc gravida risus purus, at mollis mi efficitur id. Suspendisse non posuere dui. Sed fringilla metus sed elementum facilisis. Cras iaculis, nisl ut facilisis consectetur, tortor tellus sodales elit, non dapibus arcu ipsum ac est. Mauris pulvinar vehicula purus. Curabitur in rutrum metus. Nulla vel dictum felis, in commodo arcu. Ut ultrices a sapien sit amet tincidunt. Mauris commodo ipsum id faucibus rhoncus. Suspendisse aliquam urna turpis, in iaculis nisl blandit quis. Suspendisse ut iaculis eros. Nam sit amet augue laoreet, tempor nulla in, hendrerit purus. Morbi varius diam in cursus finibus. Proin nec pulvinar lacus.

														Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam ut sapien mattis, placerat odio id, venenatis turpis. Vivamus augue augue, venenatis quis neque sit amet, vulputate dignissim mi. Aenean pulvinar ex eu massa aliquam scelerisque. Aliquam non leo at dui feugiat malesuada. Donec eleifend lacinia nulla, ac blandit velit tempor at. Cras turpis magna, aliquam eget turpis eu, dignissim interdum ante. Nullam consequat sapien id augue euismod placerat. In vel rutrum neque, eu aliquet nisl. Vestibulum tempor fringilla nisl in pretium. Donec vulputate, neque a tincidunt vehicula, lorem sem pretium dui, eget volutpat sem sem et nulla. Mauris non sapien nisl. Fusce vel pharetra velit, at pulvinar dui. Nunc semper dignissim dolor vitae volutpat. In eros ligula, aliquet eget velit a, iaculis faucibus urna. Maecenas faucibus felis mi, ac fringilla lectus pellentesque condimentum.

														Etiam viverra dui leo, eget eleifend nibh pretium at. Vivamus in dui gravida velit efficitur porta in sed odio. Curabitur quis sapien vel lectus aliquam posuere eu imperdiet mi. Sed tristique, felis in egestas vestibulum, sem risus tincidunt purus, eu tempor sem neque eget leo. Maecenas nec congue mi, ac feugiat ligula. Donec maximus lorem ut maximus faucibus. Nulla ac massa ipsum. Vestibulum laoreet, felis id congue gravida, nisi libero rhoncus nulla, eu rhoncus odio mauris at odio.

														Quisque vel scelerisque lectus. Integer vel elit sed turpis eleifend scelerisque sit amet bibendum libero. Quisque tincidunt varius enim id tempus. Aliquam erat volutpat. Quisque rhoncus purus ex, eget egestas dui volutpat finibus. Mauris ex erat, gravida nec arcu euismod, ultricies pellentesque dui. Cras in convallis nulla, vel efficitur dolor. Etiam feugiat, magna a vehicula ultrices, justo velit maximus est, vel pharetra metus metus eget nisl. Duis diam neque, pharetra at sapien fermentum, mollis sodals turpis. Nam vulputate libero a faucibus gravida.</p>
												      </div>
												      <div class="modal-footer">
												        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
												      </div>
												    </div>

												  </div>
												</div>

@endsection