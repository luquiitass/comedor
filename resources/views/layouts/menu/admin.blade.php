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
        <img class="img" src="{{asset(public_path().'img/app_unam.png')}}" >
        <p class="nombreApp" >Comedor Apostoles</p>
      </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav pull-left">
          <li class=" {{(Request::url()=='')}} "><a href="{{route('admin_admin')}}">Home</a></li>
          <li class=" {{(Request::url()==(route('login')) ? 'active':'')}} "><a href="{{route('admin_users')}}">Usuarios</a></li>
          <li class=" {{(Request::url()==(route('login')) ? 'active':'')}} "><a href="{{route('admin_faltas')}}">Faltas</a></li>
          <li class=" {{(Request::url()==(route('login')) ? 'active':'')}} "><a href="{{route('admin_anuncios')}}">Anuncios</a></li>
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
              <li role="separator" class="divider"></li>
              @if($user->isComensal())
              <li> <a href="{{route('user_home')}}">Modo Comensal</a></li>
              @endif
              <li> {{ link_to_route('logout','Salir') }}</li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
</nav>