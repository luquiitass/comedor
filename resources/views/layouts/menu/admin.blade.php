<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <p class="navbar-brand" style="color: #fff; ">Comedor Apostoles</p>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav pull-left">
          <li class=" @yield('menu_admin','')"><a href="{{route('admin_admin')}}">Inicio</a></li>
          <li class=" @yield('menu_usuarios','')"><a href="{{route('admin_users')}}">Usuarios</a></li>
          <li class=" @yield('menu_faltas','')"><a href="{{route('admin_faltas')}}">Faltas</a></li>
          <li class=" @yield('menu_anuncios','')"><a href="{{route('admin_anuncios')}}">Anuncios</a></li>
          <li class=" @yield('menu_anotados','')"><a href="{{route('admin_anotados')}}">Anotados</a></li>
        </ul>

        <ul class="nav navbar-nav pull-right" >
          <li class="dropdown">
             <a id="legajo" value="{{Auth::user()->legajo}}" type="button" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fff">
              <span><i class="glyphicon glyphicon-user"></i></span>
               {{Auth::user()->apellido}} 
               {{Auth::user()->nombre}}
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li>{{link_to_route('user_edit','Modificar Datos')}}</li>
              @if($user->isComensal())
              <li role="separator" class="divider"></li>
              <li> <a href="{{route('user_inicio')}}">Modo Comensal</a></li>
              @endif
              <li> {{ link_to_route('logout','Salir') }}</li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
  </div>
</nav>