<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Estado_usuario;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class Estado_usuarioController
 *
 * @author  The scaffold-interface created at 2016-07-07 04:53:14pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Estado_usuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $estado_usuarios = Estado_usuario::all();
        return view('estado_usuario.index',compact('estado_usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('estado_usuario.create'
                );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::except('_token');

        $estado_usuario = new Estado_usuario();

        $estado_usuario->nombre = $input['nombre'];

        $estado_usuario->descripcion = $input['descripcion'];


        
        
        $estado_usuario->save();

        return redirect('estado_usuario');
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Request::ajax())
        {
            return URL::to('estado_usuario/'.$id);
        }

        $estado_usuario = Estado_usuario::findOrfail($id);
        return view('estado_usuario.show',compact('estado_usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Request::ajax())
        {
            return URL::to('estado_usuario/'. $id . '/edit');
        }

        
        $estado_usuario = Estado_usuario::findOrfail($id);
        return view('estado_usuario.edit',compact('estado_usuario'
                )
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Request::except('_token');

        $estado_usuario = Estado_usuario::findOrfail($id);
    	
        $estado_usuario->nombre = $input['nombre'];

        $estado_usuario->descripcion = $input['descripcion'];
        
        
        $estado_usuario->save();

        return redirect('estado_usuario');
    }

    /**
     * Delete confirmation message by Ajaxis
     *
     * @link  https://github.com/amranidev/ajaxis
     *
     * @return  String
     */
    public function DeleteMsg($id)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/estado_usuario/'. $id . '/delete/');

        if(Request::ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$estado_usuario = Estado_usuario::findOrfail($id);
     	$estado_usuario->delete();
        return URL::to('estado_usuario');
    }
}
