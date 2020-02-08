<div class="form-group">
	{!! Form::label('nome', 'Nome:', ['class' => 'control-label col-md-2 '])!!}
	<div class="col-md-5">
	{!! Form::text('nome',null, ['class'=>'form-control'])!!}	
	</div>

</div>


<div class="form-group">
	{!! Html::decode(Form::label('imagem', 'Imagem: ' , ['class' =>'control-label col-md-2' ]) )!!}
	<div class="col-md-3">
					

			<div class="btn btn-primary imagem_tema">Escolher Imagem <i class="fa fa-picture-o" aria-hidden="true"></i></div>

			<button type="button" class="btn btn-danger remover_imagem_tema" aria-label="Close" onclick="remover()" data-img="remover">Remover Imagem <i class="fa fa-trash" aria-hidden="true"></i></button>

			<a href="#" data-placement="bottom" data-toggle="tooltip" title="Imagens com extensão png, gif e jpg, com no máximo 2 Mb."> <i class="fa fa-question-circle" aria-hidden="true" ></i></a>
				
					<div id="imageTema">							
						
					</div>

				<div class="ocultar"> 
					{!!Form::file('imagem', null, ['class' => 'form-control ']) !!}
				</div>
		<input type="hidden" name="input_imagem_tema" >
	</div>
</div>


<div class="form-group">
	{!! Form::label('descricao', 'Descrição:',['class'=>'control-label col-md-2'])!!}
  
  <div class="col-md-12">
	 {!! Form::textarea('descricao',null,['rows'=>'15', 'class'=>'descricao_area form-control'])!!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-2">
    <button type="button" class="btn btn-info modalPerguntas">Adicionar Perguntas</button>
    <button type="button" class="ocultar abrirModalPerguntas"  data-toggle="modal" data-target="#modalPerguntas">Adicionar Perguntas</button>
    <button type="button" class="ocultar modalCarregando"  data-toggle="modal" data-target="#modalCarregando">Adicionar Perguntas</button>
  </div>
</div>

@if(!isset($tema))
<div class="perguntaTema ocultar">
  

  <table class="table table-bordered table-hover corpo">
      <thead>
        <tr>
            <th>Pergunta</th>
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
            <th>Pergunta</th>
            <th>Ações</th>
        </tr>
      </thead>

      <tbody>
      @foreach($tema->PerguntasTemas as $pergunta_tema)

        <tr>
          <td>{{ strip_tags($pergunta_tema->Pergunta->pergunta) }} <input type="hidden" name="perguntas_temas[{{$pergunta_tema->Pergunta->id}}][id]"
           value="{{$pergunta_tema->Pergunta->id}}" data-pergunta-tema="sim"></td>
          <td><button type="button" onclick="removerPerguntaTema({{$pergunta_tema->Pergunta->id}})" class="btn btn-danger">Remover pergunta</button></td>
        </tr>

      @endforeach
      </tbody>
   
  </table>
</div>

@endif
 @include('sistema.temas.modalperguntas')


