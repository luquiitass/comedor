<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Estadossemanal;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class EstadossemanalController
 *
 * @author  The scaffold-interface created at 2016-07-01 02:11:45pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class EstadossemanalController extends Controller
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
        $user=\Auth::user();//obtiene el usuario logueado
        $estados = $user->estadosSemanal();//obtiene los estados de este usuario 
        
        //dd($estados);
        //dd($user);

        return view('estadossemanal.show',compact('estados','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('estadossemanal.create'
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

        $estadossemanal = new Estadossemanal();

        
        $estadossemanal->lunes = $input['lunes'];

        
        $estadossemanal->martes = $input['martes'];

        
        $estadossemanal->miercoles = $input['miercoles'];

        
        $estadossemanal->jueves = $input['jueves'];

        
        $estadossemanal->viernes = $input['viernes'];

        
        
        $estadossemanal->save();

        return redirect('estadossemanal');
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
            return URL::to('estados/'.$id);
        }
        $estados = Estadossemanal::findOrfail($id);
        $user= $estados->user();
        //dd($estados);
        //dd($user);

        return view('estadossemanal.show',compact('estados','user'));
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
            return URL::to('estadossemanal/'. $id . '/edit');
        }

        $estadossemanal = Estadossemanal::findOrfail($id);
        return view('estadossemanal.edit',compact('estadossemanal'
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

        $id_estado= $input['id_estado'];

        $estadossemanal = Estadossemanal::findOrfail($id_estado);

        $diaModificar=strtolower($input['dia']);
        // Obtenemos el dia a modificar y lo pasamos a minuscula xq en el imput comienza con mayuscula y en la BD se encuentra en minuscula;

        $estadossemanal[$diaModificar] = $input['estado']; 
        //mofificamos el estado por el q se ha pasado por post; 
        $estadossemanal->save();
        
        $estados= $estadossemanal;       
        
        return view('estadossemanal.index',compact('estados'))->render();
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/estadossemanal/'. $id . '/delete/');

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
     	$estadossemanal = Estadossemanal::findOrfail($id);
     	$estadossemanal->delete();
        return URL::to('estadossemanal');
    }
}
