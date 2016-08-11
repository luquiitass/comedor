<?php

namespace App\Http\Controllers;


use Request;
use App\Http\Requests\UserRegistRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserSolicitudRequest;
use App\Http\Requests\AdminUpdateUser;
use App\User;
use App\Funciones;
use App\Estado_usuario;

use Amranidev\Ajaxis\Ajaxis;
use URL;


class UsersController extends Controller
{

    public function __construct()
    {
        //dd('netro al constructor');
        $this->middleware('auth',['except' => ['solicitud','storeSolicitud']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $estados = \App\Estado_usuario::get();
        //dd($estados);
        $users = User::join('estado_usuarios','users.estado_id','=','estado_usuarios.id')->select('users.id','users.nombre','users.apellido','users.legajo','estado_usuarios.nombre as estado')->get();
        //dd($users);
        return view('users.index',compact('user','users','estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    public function editarDatos()
    {
        $user= \Auth::user();
        return view('users.edit',compact('user'));
    }

    public function modificarPassword(){
        $user =\Auth::user();
        $input = Request::except('_token');

        if ($user->isPassword($input['cont_actual'])) { //Compara si la contraseña actual coincide con la de la BD
            if ($input['cont_nueva'] === $input['cont_repet']) { //las contraseñas repetidas deben ser iguales
                $user->password = bcrypt($input['cont_nueva']); //se modifica la contraseña
                $user->save();  

                $arr = json_encode(array_merge(array('limpiar' => 'true'),json_decode(Funciones::getJSON("true","Contraseña modificada","reload"),true)));

                //agarega un objeto mas al jsoon devuelto por la funcion getJSON.
                return $arr;
            }else{
                return Funciones::getJSON("false","Las contraseñas nuevas deben ser iguales");
            }
        }else{
            return Funciones::getJSON("false","Las contraseña actual es incorrecta");
        }
        
    }

    public function userUpdate(UserUpdateRequest $request)
    {
        $input =Request::only('email','telefono','dni');
        $user = \Auth::user();
        if (User::where('email','=',$input['email'])->where('id','!=',$user->id)->count() == 0) 
        {
            if (User::where('dni','=',$input['dni'])->where('id','!=',$user->id)->count() == 0)
            {
                $user->update($input);
                $funcion = array('funcion' => 'reload');
                return Funciones::getJSON_add_array($funcion,Funciones::getJSON('true','Modificado'));
            }else
            {
               return Funciones::getJSON('false',"El DNI ingresado ya existe");
            }
        }else
        {
                return Funciones::getJSON('false',"El Email ingresado ya existe");
        }
        return "nada";
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRegistRequest $request)
    {
        $input = Request::except('_token','url');
        $data= $request->only('email','legajo','nombre','apellido','dni','telefono','tipo','estado_id');
        $data['password']= bcrypt('1');
        $data['image']='storage/login2.png';
        $user= new User();//create($data);
        $user->create($data);

        if($user)
        {
            //\Auth::login($user);
            //$resultado = array_merge(array('limpiar'=>'true'),json_decode(Funciones::getJSON('true','Usuario Registrado','reload'),true));
            //return json_encode($resultado);
            return redirect()->route('admin_users');
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Request::ajax()) {
            $user = User::findOrfail($id);
            return Ajaxis::BtDisplay($user->mostrarMisDatosAjaxis());
            //return json_encode($user->mostrarMisDatos());
        }
        $user= User::findOrfail($id);
        return view('users.inicio',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        $url= '/user/'.$user->id.'/update';
        if (Request::ajax()) {
            return Ajaxis::BtEditFormModal($user->editarDatosAjaxis(),$url);
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateUser $request, $id)
    {
        $user= USER::findOrfail($id);
        $data = Request::only('legajo','nombre','apellido','tipo');
        if (Request::ajax()) {
            if ($user->update($data)) {
                return json_encode(['mensaje'=>'Modificado','location'=>URL::to('usuarios')]);
            }else{
                return json_encode(['mensaje'=>'Error al modificar']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteMsg($id)
    {
        $msg = Ajaxis::BtDeleting('Eliminar Comensal','¿Seguro que quieres eliminar este comensal?','/user/'. $id . '/destroy/');

        if(Request::ajax())
        {
            return $msg;
        }
    }

    public function destroy($id)
    {
        $us = User::findOrfail($id);
        $us->delete();
        return URL::to('usuarios');
    }

    public function inicio()
    {
        if (Request::ajax()) {
            $ajx=Request::ajax();
            $user= \Auth::user();
            return view('users.inicio',compact('user','ajax'))->render();
        }
        $user= \Auth::user();
        
        $estadosSemanal = $user->estadosSemanal()->diasAnotado();

        $faltas = $user->obtenerFaltasMesActual();
        
        return view('users.inicio',compact('user','estadosSemanal','faltas'));
    }

    public function estadosSemanal($id){
        $user= User::findOrfail($id);
        $estados=$user->estadosSemenal();
        return view('users.estadosSemanal',compact('estados','user'));
    }

    public function updateEstadoSemanal($id,$id_estado){
        $user= User::findOrfail($id);
        $estados= $user->estadosSemanal();

        $input = Request::except('_token');

        dd($input);

        $estados[$input['dia']] = $input['estado'];

        $estados.save(); 

    }

    public function modificarEstadoUsuario()
    {
        $data=Request::except('_token');

        $user= User::findOrfail($data['id']);

        $user->estado_id=$data['estado'];

        $user->save();

        return back();


        //dd($data);
    }

    public function solicitud()
    {
        return view('users.create');
    }

    public function storeSolicitud(UserSolicitudRequest $request){
        $data = Request::except('_token');

        $estado=Estado_usuario::where('nombre','=','pendiente')->first()->id;

        $data['password']= bcrypt('1');
        $data['tipo']='comensal';
        $data['estado_id']= $estado;


        $data['image']='storage/login2.png';
        $user= new User();//create($data);
        $user->create($data);

        if($user)
        {
            //\Auth::login($user);
            //$resultado = array_merge(array('limpiar'=>'true'),json_decode(Funciones::getJSON('true','Usuario Registrado','reload'),true));
            //return json_encode($resultado);
            return redirect()->route('pendiente');
        }
        return back()->withInput();
    }



    /*************** Vistas **************/

}
