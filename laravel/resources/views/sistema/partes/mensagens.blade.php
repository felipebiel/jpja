@if(session('success'))

    <div class="alert alert-success">

        {{session('success')}}


    </div>
                        
 @endif

 <!-- Mensagem de erro-->
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="alert alert-danger erros ocultar">
	
</div>