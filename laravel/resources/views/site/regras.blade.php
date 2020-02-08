@extends('layouts.site')

@section('titulo')
    Bem vindo a Jp Já
@endsection


@section('content')

<style>

.descer{

    height: 50px;
    padding-top: 100px;
}
    
.painelderegras{

   
    height: 600px;
    background-color:white;
    padding:25px;
    margin: 10px;
    border-radius:10px;
    box-shadow: gray 5px 5px 5px;

}

#tituloregras{
text-align: center;

}



</style>


<main class="index">

    <div class="container">

                    <div class="descer">
                        
                  
                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                                
                                <div class="painelderegras">

                                   

                                        <h1 id="tituloregras"><span>Regras</span></h1>
                                        
                                        <ul>
                                            <br>

                                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et augue in metus aliquet varius. Suspendisse in eleifend purus, eget rutrum nisi. Ut egestas tortor quis neque blandit aliquet. Etiam felis dolor, vehicula eget nunc id, mattis euismod sapien. Vestibulum eu nisl ac 
                                            </li>
                                            <br>
                                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et augue in metus aliquet varius. Suspendisse in eleifend purus, eget rutrum nisi. Ut egestas tortor quis neque blandit aliquet. Etiam felis dolor, vehicula eget nunc id, mattis euismod sapien. Vestibulum eu nisl ac 
                                            </li><br>

                                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et augue in metus aliquet varius. Suspendisse in eleifend purus, eget rutrum nisi. Ut egestas tortor quis neque blandit aliquet. Etiam felis dolor, vehicula eget nunc id, mattis euismod sapien. Vestibulum eu nisl ac 
                                            </li>  
                    
                                        </ul>


                                </div>

                        </div>

                    </div>
    </div>

</main>

@endsection
