<nav class="navbar navbar-default"">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="img_menu">
        <img class="img" src="{{asset(public_path().'/img/app_unam.png')}}" >
        <p class="nombreApp" >Comedor Apostoles</p>
      </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav pull-left">
          <li class=" {{(Request::url()==route('user_home') ? 'active':'')}} "><a href="{{route('user_home')}}">Home</a></li>
          <li class=" {{(Request::url()==(route('user_estados')) ? 'active':'')}} "><a href="{{route('user_estados')}}">Estados</a></li>
          <li class=" {{(Request::url()==(route('user_faltas')) ? 'active':'')}} "><a href="{{route('user_faltas')}}">Faltas</a></li>
          <li class=" {{(Request::url()==(route('user_anuncios')) ? 'active':'')}} "><a href="{{route('user_anuncios')}}">Anuncios</a></li>
        </ul>

        <ul class="nav navbar-nav pull-right" >
          <li class="dropdown">
            <button id="legajo" value="{{Auth::user()->legajo}}" type="button" class="dropdown-toggle btn btn-success" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span><i class="glyphicon glyphicon-user"></i></span>
             {{Auth::user()->legajo}}
            <span class="caret"></span></a>
            </button>
            <ul class="dropdown-menu">
              <li>{{link_to_route('user_edit','Modificar Datos')}}</li>
              @if($user->isAdmin())
              <li role="separator" class="divider"></li>
              <li> <a href="/admin">Modo Administrador</a></li>
              @endif
              <li role="separator" class="divider"></li>
              <li> {{ link_to_route('logout','Salir') }}</li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
</nav>