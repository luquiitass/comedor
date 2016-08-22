<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Estado_usuario;
use Datatables;


class DT_UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function getViewUsers(){
    	return view('users.datatables.DT_user');
    }
    public function getUsersInactivos(){
         $estado = Estado_usuario::where('nombre','=','inactivo')->first();
        $users = User::select('id','nombre','apellido','legajo','estado_id')->where('estado_id','=',$estado->id);
        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return view('users.datatables.botones',compact('user'))->render() ;
            })
            ->editColumn('apellido', function($user){
                    return "<a href ='/user/". $user->id ."'>".$user->apellido."</a>";
            })
            ->make(true);
    }
     public function getUsersPendientes(){
        $estado = Estado_usuario::where('nombre','=','pendiente')->first();
        $users = User::select('id','nombre','apellido','legajo','estado_id')->where('estado_id','=',$estado->id);
        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return view('users.datatables.botones',compact('user'))->render();
            })
            ->editColumn('apellido', function($user){
                    return "<a href ='/user/". $user->id ."'>".$user->apellido."</a>";
            })
            ->make(true);
    }
    public function getUsersActivos(){
        $estado = Estado_usuario::where('nombre','=','activo')->first();
        $users = User::select('id','nombre','apellido','legajo','estado_id')->where('estado_id','=',$estado->id);
        
        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return view('users.datatables.botones',compact('user'))->render();
            })
            ->editColumn('apellido', function($user){
                    return "<a href ='/user/". $user->id ."'>".$user->apellido."</a>";
            })
            ->make(true);
    }
    public function getAllUsers(){
        $users = User::select('id','nombre','apellido','legajo','estado_id');
        $estados = Estado_usuario::get();
    	return Datatables::of($users)
    		->addColumn('action', function ($user) {
                return view('users.datatables.botones',compact('user'))->render();
            })
            ->addColumn('estado', function ($user) {
                return $user->estado->nombre;
            })
            ->editColumn('apellido', function($user){
                    return "<a href ='/user/". $user->id ."'>".$user->apellido."</a>";
            })
            ->make(true);
    }
}
