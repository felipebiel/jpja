<div class="form-group">
	{!! Form::label('nome', 'Nome:', ['class' => 'control-label col-md-2 '])!!}
	<div class="col-md-5">
	{!! Form::text('nome',null, ['class'=>'form-control'])!!}	
	</div>

</div>


<div class="form-group">
	{!! Html::decode(Form::label('imagem', 'Imagem: ' , ['class' =>'control-label col-md-2' ]) )!!}
	<div class="col-md-3">
					

			<div class="btn btn-primary imagem_modulo">Escolher Imagem <i class="fa fa-picture-o" aria-hidden="true"></i></div>

			<button type="button" class="btn btn-danger remover_imagem_modulo" aria-label="Close" onclick="remover()" data-img="remover">Remover Imagem <i class="fa fa-trash" aria-hidden="true"></i></button>

			<a href="#" data-placement="bottom" data-toggle="tooltip" title="Imagens com extensão png, gif e jpg, com no máximo 2 Mb."> <i class="fa fa-question-circle" aria-hidden="true" ></i></a>
				
					<div id="imageModulo">							
						
					</div>

				<div class="ocultar"> 
					{!!Form::file('imagem', null, ['class' => 'form-control ']) !!}
				</div>
		<input type="hidden" name="input_imagem_modulo" >
	</div>
</div>


<div class="form-group">
	{!! Form::label('descricao', 'Descrição:',['class'=>'control-label col-md-2'])!!}
  
  <div class="col-md-12">
	 {!! Form::textarea('descricao',null,['rows'=>'5', 'class'=>'descricao_area form-control'])!!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-2">
    <button type="button" class="btn btn-info modalTemas">Adicionar Temas</button>
    <button type="button" class="ocultar abrirModalTemas"  data-toggle="modal" data-target="#modalTemas"></button>
    <button type="button" class="ocultar modalCarregando"  data-toggle="modal" data-target="#modalCarregando"></button>
  </div>
</div>

@if(!isset($modulo))
<div class="moduloTema ocultar">
  

  <table class="table table-bordered table-hover corpo">
      <thead>
        <tr>
            <th>Temas</th>
            <th>Ações</th>
        </tr>
      </thead>

      <tbody>
        
      </tbody>
   
  </table>
</div>
@else

<div class="perguntaTema ">
  

  <table class="table table-bordered table-hover corpo">
      <thead>
        <tr>
            <th>Temas</th>
            <th>Ações</th>
        </tr>
      </thead>

      <tbody>
      @foreach($modulo->ModulosTemas as $modulo_tema)

        <tr>
          <td>{{ strip_tags($modulo_tema->Tema->nome) }} <input type="hidden" name="modulos_temas[{{$modulo_tema->Tema->id}}][id]"
           value="{{$modulo_tema->Tema->id}}" data-pergunta-tema="sim"></td>
          <td><button type="button" onclick="removerModuloTema({{$modulo_tema->Tema->id}})" class="btn btn-danger">Remover Tema</button></td>
        </tr>

      @endforeach
      </tbody>
   
  </table>
</div>

@endif
 @include('sistema.modulos.modaltemas')


