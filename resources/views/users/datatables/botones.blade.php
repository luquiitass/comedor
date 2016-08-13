<a data-toggle="modal" data-target="#myModal" class = 'btn btn-info display btn-xs' data-link = "/user/{{$user->id}}" ><i class = 'material-icons'>Ver</i></a>

<a data-toggle="modal" data-target="#myModal" class = 'btn btn-danger btn-xs delete' data-link = "/user/{{$user->id}}/deleteMsg" ><i class = 'material-icons'>Eliminar</i></a>

<button data-toggle="modal" data-target="#myModal" class = 'edit btn btn-success btn-xs'  data-link = '/user/{{$user->id}}/edit'><i class = 'material-icons'>Editar</i></button>