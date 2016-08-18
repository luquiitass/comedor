<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Estado_usuario;
use Datatables;


class DataTablesController extends Controller
{
    public function getViewUsers(){
    	return view('users.datatables.DT_user');
    }

    public function getUsersInactivos(){
         $estado = Estado_usuario::where('nombre','=','inactivo')->first();
        $users = User::select('id','nombre','apellido','legajo','estado_id')->where('estado_id','=',$estado->id);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $estados = Estado_usuario::get();
                $estado= 'inactivo';
                return view('users.datatables.botones',compact('user'))->render() . view('users.datatables.boton_activo-inactivo-pendiente',compact('estados','user','estado'))->render();
            })
            ->make(true);
    }

     public function getUsersPendientes(){
        $estado = Estado_usuario::where('nombre','=','pendiente')->first();
        $users = User::select('id','nombre','apellido','legajo','estado_id')->where('estado_id','=',$estado->id);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $estados = Estado_usuario::get();
                $estado= 'pendiente';
                return view('users.datatables.botones',compact('user'))->render() . view('users.datatables.boton_activo-inactivo-pendiente',compact('estados','user','estado'))->render();
            })
            ->make(true);
    }

    public function getUsersActivos(){
        $estado = Estado_usuario::where('nombre','=','activo')->first();
        $users = User::select('id','nombre','apellido','legajo','estado_id')->where('estado_id','=',$estado->id);
        

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $estados = Estado_usuario::get();
                $estado= 'activo';
                return view('users.datatables.botones',compact('user'))->render() . view('users.datatables.boton_activo-inactivo-pendiente',compact('estados','user','estado'))->render();
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
            ->make(true);
    }
}
