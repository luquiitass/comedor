<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Falta;
use App\User;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class FaltaController
 *
 * @author  The scaffold-interface created at 2016-07-06 04:11:44pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class FaltaController extends Controller
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
        $user= \Auth::user();
        $mesActual= date('M');

        return view('falta.index',compact('mesActual','user'));

    }



    public function faltas()
    {
        $user= \Auth::user();

        $users=  User::leftjoin('faltas','faltas.user_id','=','users.id')->select(\DB::raw('count(faltas.user_id) as cantFaltas,users.apellido,users.nombre,users.legajo,users.id'))->groupBy('id')->orderBy('id')->get();

        //dd($users);
        //$user->obtenerFaltasPorMes();
        $mesActual= date('M');

        return view('falta.admin_index',compact('users','user','mesActual'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('falta.create'
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

        $falta = new Falta();

        
        $falta->fecha = $input['fecha'];

        
        $falta->user_id = $input['user_id'];

        
        
        $falta->save();

        return redirect('falta');
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
            return URL::to('falta/'.$id);
        }

        $falta = Falta::findOrfail($id);
        return view('falta.show',compact('falta'));
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
            return URL::to('falta/'. $id . '/edit');
        }

        
        $falta = Falta::findOrfail($id);
        return view('falta.edit',compact('falta'
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

        $falta = Falta::findOrfail($id);
    	
        $falta->fecha = $input['fecha'];
        
        $falta->user_id = $input['user_id'];
        
        
        $falta->save();

        return redirect('falta');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/falta/'. $id . '/delete/');

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
     	$falta = Falta::findOrfail($id);
     	$falta->delete();
        return URL::to('falta');
    }
}
