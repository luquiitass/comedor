<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Requests\UserRegistRequest;
use App\User;
use Request;

class UsersController extends Controller
{

    public function __construct()
    {
        //dd('netro al constructor');
        $this->middleware('auth',['except' => ['create','store']]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRegistRequest $request)
    {
        $data= $request->only('email','legajo','nombre','apellido','dni','telefono');
        $data['estado_id']= '2';
        $data['password']= bcrypt('1');
        $user= User::create($data);
        if($user)
        {
            \Auth::login($user);
            return redirect()->route('user/'.$user->id);
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
            return json_encode($user->mostrarMisDatos());
        }
        $user= User::findOrfail($id);
        return view('users.home',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function home($id)
    {
        $user= User::findOrfail($id);
        return view('users.home',compact('user'));
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
}
