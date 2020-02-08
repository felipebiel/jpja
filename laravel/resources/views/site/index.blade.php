@extends('layouts.site')

@section('titulo')
    Bem vindo a Jp Já
@endsection


@section('content')

<main class="index">

    <div class="container">

        <div class="posicao-index">
            <div class="row">
                <div class="col-md-12">
                    <center>
                    @if(session('erro'))
                        <div class="alert alert-danger">
                            {{session('erro')}}
                        </div>   
                    @endif
                        <img src="{{ url('arquivos/imagens/logo_quadrada.png')}}"  class="img-responsive avatar">

                        <h1><span>Aprender Japonês pode ser divertido!</span></h1>

                        <h1><span>Clique no link abaixo e descubra!</span></h1>

                        <a href="{{ url('/cadastro')}}" class="btcomecaragora" > Começar agora <i class="fa fa-sign-in" aria-hidden="true"></i></a>


                    </center>
                </div>
            </div>
        </div>
        
    </div>

</main>

@push('scriptTela')

<script type="text/javascript">
        @if(!empty(\Auth::user()))

            $(document).ready(function(){
                window.location.href = "{{ url('/painel')}}";


            });

        @endif

</script>
@endpush

@endsection





