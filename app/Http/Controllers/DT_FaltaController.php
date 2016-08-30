<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use Datatables;

class DT_FaltaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function getFaltasPorMes()
    {
    	$users =User::with('faltas');
    				
    	return Datatables::of($users)
    			->addColumn('action', function ($user) {
                return view('users.datatables.botones',compact('user'))->render() ;
            	})
            	->addColumn('action', function ($user) {
            		$ver = "<a href ='/falta/". $user->id ."' class = 'btn btn-info btn-xs'>Ver Faltas</a>";
                return $ver;
            	})
                ->addColumn('cant_total', function ($user) {
                    return $user->faltas->count();
                })
                ->addColumn('cant por mes', function ($user) {
                    return $user->obtenerFaltasMesActual()->count();
                })
                ->editColumn('apellido', function($user){
                    return "<a href ='/user/". $user->id ."'>".$user->apellido."</a>";
                })
    			->make(true);

    }
}


