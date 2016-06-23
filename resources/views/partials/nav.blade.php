    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                   <i class="fa fa-1x fa-globe"></i> Como esta el mar
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Inicio</a></li>
                    <li><a href="https://www.facebook.com/groups/comoestaelmarmdp/?fref=ts" target="_blank"><i class="fa fa-facebook"></i> Grupo en Facebook</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Ingresar</a></li>
                        <li><a href="{{ url('/register') }}">Registrase</a></li>
                    @else
                        <li><a href="{{route('post.myposts')}}"><i class="fa fa-btn fa-list"></i>Mis propuestas</a></li>
                        <li><a href="{{ route('user.index') }}"> <i class="fa fa-group"></i> Personas involucradas</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->nombre }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('user.edit', Auth::user()->id) }}"><i class="fa fa-btn fa-user"></i>Mi perfil</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>