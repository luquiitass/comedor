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
    	return view('auth.login');
    }

    public function handleLogin(UserLoginRequest $reques){

    	$data = $reques->only('email' , 'password');
    	if (\Auth::attempt($data)) {
            if (\Auth::user()->isAdmin()) {
                return redirect()->intended('admin');
            }else{
    		  return redirect()->intended('/user_home');
            }
    	}
    	return back()->withInput()->withErrors(['email' => 'Usuario o contraseña incorrecta']);
    }

    public function logout()
    {
    	\Auth::logout();
    	return redirect()->route('login');
    }


}
