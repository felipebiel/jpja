
<header class="cabecalho">
  <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                </button>
                
                @if(!\Auth::user())
                <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ url('arquivos/imagens/logo_horizontal.png')}}"  class="logo_horinzontal">
                    </a>

                @else

                    <a class="navbar-brand" href="{{ url('/painel') }}">
                        <img src="{{ url('arquivos/imagens/logo_horizontal.png')}}"  class="logo_horinzontal">
                    </a>

                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->

                <ul class="nav navbar-nav navbar-right">

                @if(!\Auth::user())
                    <
                        <li><a class="btnavbar" href="{{url('/entrar') }}"> <i class="fa fa-user" aria-hidden="true"></i>  Entrar  </a></li>
                        <li><a class="btnavbar" href="{{url('/cadastro') }}"> <i class="fa fa-address-card" aria-hidden="true"></i>  Cadastre-se  </a> </li>


                @else
                        <li><a class="btnavbar" href="{{url('/painel') }}"> <i class="fa fa-home" aria-hidden="true"></i> Minha Conta </a></li>
                        <li><a class="btnavbar " href="{{url('/logout') }}"> <i class="fa fa-sign-out" aria-hidden="true"></i>  Sair  </a> </li>
                        
                     <!--   
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Praticar
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Hiragana</a></li>
                              <li><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Katakana</a></li>
                              <li><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Kanji</a></li>
                            </ul>
                        </li>
                        -->
                @endif        
            
            </div>
        </div>
    </nav>
</header>
