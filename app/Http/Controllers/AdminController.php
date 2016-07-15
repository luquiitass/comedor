<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Falta;
use App\Estadossemanal;
use App\Anuncio;
use App\Funciones;

class AdminController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
    	$user=\Auth::user();
    	$hoy = Funciones::str_hoyEs();
    	$mañana = Funciones::str_mañanaEs();
    	$cantAnotadosPorDia= Estadossemanal::cantAnotadosPorDia();



    	return view('admin.index',compact('user','cantAnotadosPorDia','hoy','mañana'));
    }
}
