

@if(!\Auth::user())

<footer class='rodape'>
	<div class='container rbmobille'>
		<div class="row"> 	
	
			
			<div class="col-md-4 col-sm-4">
				<a href="{{url('/regras') }}"">
					<i class="fa fa-book" aria-hidden="true"></i>
				Regras</a>
		    
		    </div>
			
			<div class="col-md-4 col-sm-4">
				<a href="{{url('/faleconosco') }}">
					<i class="fa fa-comments-o" aria-hidden="true"></i>
				Fale conosco</a>
			</div>
			

			<div class="col-md-4 col-sm-4">
				<a href="">
					<i class="fa fa-address-card-o" aria-hidden="true"></i>
				Perguntas Frequentes</a>
			</div>	
			
			
		</div>
	</div>

	<div class='container nivelarespaconorodape'>
		<center>
			2017&#9400; - JPJá Todos os direitos reservados
		</center>
	</div>
</footer>


	@else

<footer class='rodape'>
	<div class='container'>
		<div class="row"> 	
	
			
			<div class="col-md-4 col-sm-4">
				<a href="{{url('/regras') }}"">
					<i class="fa fa-book" aria-hidden="true"></i>
				Regras</a>
		    
		    </div>
			
			<div class="col-md-4 col-sm-4">
				<a href="{{url('/faleconosco') }}">
					<i class="fa fa-comments-o" aria-hidden="true"></i>
				Fale conosco</a>
			</div>
			

			<div class="col-md-4 col-sm-4">
				<a href="">
					<i class="fa fa-address-card-o" aria-hidden="true"></i>
				Perguntas Frequentes</a>
			</div>	
			
			
		</div>
	</div>

	<div class='container'>
		<center>
			2017&#9400; - JPJá Todos os direitos reservados
		</center>
	</div>
</footer>
@endif