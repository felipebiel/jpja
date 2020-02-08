<div class="form-group">
				{!! Form::label('pergunta', 'Pergunta', ['class' => 'label-control col-md-3'])!!}


		<div class ="col-md-12">
			
				{!! Form::textarea('pergunta',null,['class'=> 'form-control pergunta_tiny'])!!}
		</div>

 </div>

 <div class="form-group">
				{!! Form::label('tipo', 'Tipo', ['class' => 'label-control col-md-3'])	!!}
		<div class ="col-md-5">
			
				{!! Form::select('tipo', ['exercicios' => 'Exercícios', 'praticar' => 'Praticar'], null, ['placeholder' => 'Selecione o tipo','class '=>'form-control']) !!}

				@if(isset($pergunta))

				<input type="hidden" name="tipo_editar" value="{{$pergunta->tipo}}">
				
				@endif
		</div>

</div>

<div class="form-group ocultar exercicio">

				{!! Form::label('resposta', 'Resposta', ['class' => 'label-control col-md-3'])	!!}
		<div class ="col-md-5">
			
				{!! Form::text('resposta', null, ['class '=>'form-control']) !!}
		</div>

</div>

<div class="form-group ocultar praticar">
	<div class="col-md-10">

		{!! Form::label('alternativas', 'Alternativas', ['class' => 'label-control'])	!!}
		

		

	</div>

 
	<div class="col-md-2">
		<center> {!! Form::label('correta', 'Correta', ['class' => 'label-control'])	!!}</center>

	</div>


		

	</div>

	@for($i=0; $i<5; $i++)

	
	

	<div class="row ocultar praticar">
		<div class="col-md-10">

			{!! Form::text('opcoes['.$i.'][opcao]',null,['class'=>'form-control'])!!}
			
		</div>


		<div class="col-md-2">

		{!!Form::checkbox('opcoes['.$i.'][correta]', 1, (isset($pergunta) && isset($pergunta->Opcoes[$i]) && $pergunta->Opcoes[$i]->correta==1)? true : false,['class'=>'form-control'])!!}
			
					@if(isset($pergunta) && isset($pergunta->Opcoes[$i]))

						<input type="hidden" name="opcoes[{{$i}}][id]" value="{{$pergunta->Opcoes[$i]->id}}">
				
					@endif
	
		
		</div>

	</div>

	@endfor