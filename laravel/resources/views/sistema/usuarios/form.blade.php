<div class="form-group">

		{!!Form::label('name','Nome',['class'=>'control-label col-md-2'])!!}
		<div class="col-md-5">
		{!!Form::text('name',null,['class'=>'form-control'])!!}
		</div>
</div>
						
<div class="form-group">					
	{!!Form::label('email','Email', ['class'=>'control-label col-md-2'])!!}
	<div class="col-md-5">
	{!!Form::email('email',null,['class'=>'form-control'])!!}
	</div>
</div>
								
<div class="form-group">
	{!!Form::label('password','Senha',['class'=>'control-label col-md-2'])!!}
	<div class="col-md-5">
	{!!Form::password('password',['class'=>'form-control'])!!}
	</div>
</div>
						
<div class="form-group">
	{!!Form::label('password_confirmation','Confirmar Senha', ['class'=>'control-label col-md-2'])!!}
	<div class="col-md-5">
	{!!Form::password('password_confirmation',['class'=>'form-control'])!!}
	</div>
</div>			
