<!-- MENU A ESQUERDA -->
    <ul class="nav navbar-nav">
        <!-- Authentication Links -->
        @if(!empty(Auth::user()))
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                       Perguntas <i class="fa fa-caret-down" aria-hidden="true"></i>

            </a>

                <ul class="dropdown-menu">
                    <li><a href="{{ url('/sistema/perguntas/nova')}}">Adicionar perguntas</a></li>
                    <li><a href="{{ url('/sistema/perguntas') }}">Listar perguntas</a></li>
                </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                       Temas <i class="fa fa-caret-down" aria-hidden="true"></i>

            </a>

                <ul class="dropdown-menu">
                    <li><a href="{{ url('/sistema/temas/nova')}}">Adicionar temas</a></li>
                    <li><a href="{{ url('/sistema/temas') }}">Listar temas</a></li>
                </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                       Modulos <i class="fa fa-caret-down" aria-hidden="true"></i>

            </a>

                <ul class="dropdown-menu">
                    <li><a href="{{ url('/sistema/modulos/nova')}}">Adicionar modulos</a></li>
                    <li><a href="{{ url('/sistema/modulos') }}">Listar modulos</a></li>
                </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                       Usuários <i class="fa fa-caret-down" aria-hidden="true"></i>

            </a>

                <ul class="dropdown-menu">
                    <li><a href="{{ url('/sistema/usuarios/nova')}}">Adicionar usuários</a></li>
                    <li><a href="{{ url('/sistema/usuarios') }}">Listar usuários</a></li>
                </ul>
        </li>

        @endif
        
    </ul>

    <!-- MENU A DIREITA -->
    <ul class="nav navbar-nav navbar-right">
    @if(!empty(Auth::user()))
            <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    @if(Auth::user()->Entidade['imagem'])
                        <img src="{{ url('arquivos/img_perfil/'.Auth::user()->Entidade['imagem'])}}" class="img_perfil_adm">
                    @endif
                    {{ Auth::user()->name }}

                     <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Minha Conta</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>
                </ul>
            </li>
        @else
        <li><a href="{{ url('/login') }}">Entrar</a></li>
             
        @endif
       
    </ul>