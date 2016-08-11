<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;

use App\Http\Requests\UserLoginRequest;

use App\User;

class AuthController extends Controller
{
    public function login()
    {   
        if (\Auth::check()) {
            return redirect()->to('/');
        }
    	return view('auth.login');
    }

    public function handLogin(UserLoginRequest $reques){

    	$data = $reques->only('email' , 'password');
    	if (\Auth::attempt($data)) {
            $user=\Auth::user();
            if ($user->estado->nombre == 'activo') {
                return redirect()->to('/');
            }
            elseif($user->estado->nombre == 'pendiente')
            {  
                return redirect()->route('pendiente');//redirecciona a una pantalla que informa q esta esperando la autorizacion de el administrador

            }
            elseif ($user->estado->nombre == 'inactivo') 
            {
                return redirect()->route('inactivo');// informa qq esta inactivo por sobrepasar las faltas o lo que sea

            }
    	}
    	return back()->withInput()->withErrors(['email' => 'Usuario o contraseña incorrecta']);
    }

    public function logout()
    {
    	\Auth::logout();
    	return redirect()->route('login');
    }

    public function pendiente()
    {
        $user = \Auth::user();
        \Auth::logout();
        return view('auth.pendiente',compact('user'));
    }

    public function inactivo()
    {   $user = \Auth::user();
        \Auth::logout();
        return view('auth.inactivo',compact('user'));
    }

}
