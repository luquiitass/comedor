<?php

namespace App;

use Mail;
use Log;
use \App\Falta;

define('AUTOR','Comedor Apóstoles');

Class Email {


	public static function solicitud($user)
	{
		$mensaje = 'Hola '.$user->apellido.' '.$user->nombre.' su solicitud ha sido registrada exitosamente, en breve los administradores lo estarán aprobando la solicitud... que se yo... mensajeson copado.';

		Mail::send('emails.solicitud',compact('mensaje'),function($msj) use ($user){
			$msj->subject(AUTOR);
			$msj->to($user->email);
		});
		return 'enviado';
	}


	public static function faltas(){

		$faltas = Falta::with('user')->where('fecha','=',date('Y/m/d'))->get();

		$users = $faltas->map(function($falta,$key)
		{
			return $falta->user;
		});
		foreach ($users as $user) {
			Mail::queue('emails.faltas',compact('user'),function($msj) use ($user){
				$msj->subject(AUTOR);
				$msj->to($user->email);
			});
			Log::info('Enviando Email a '.$user->apellido .' '. $user->nombre.' Correo:'.$user->email);
		}
		return 'enviado';
	}

	public static function estadosSemanal(){
		$estado = Estado_usuario::where('nombre','activo')->with('users.estadosSemanal')->first();
		$users = $estado->users;

		//dd($users);
		foreach ($users as $user) {
			Mail::queue('emails.avisoEstadosSemanal',compact('user'),function($msj) use ($user){
				$msj->subject(AUTOR);
				$msj->to($user->email);
			});
			Log::info('Enviando Email a '.$user->apellido .' '. $user->nombre.' Correo:'.$user->email);
		}
		return 'enviado';
	}

	public static function anuncio($anuncio)
	{
		$estado = Estado_usuario::where('nombre','activo')->with('users.estadosSemanal')->first();
		$users = $estado->users;
		foreach ($users as $user) {
			Mail::queue('emails.anuncio',compact('anuncio'),function($msj) use ($user){
				$msj->subject(AUTOR);
				$msj->to($user->email);
			});
			Log::info('Enviando Email a '.$user->apellido .' '. $user->nombre.' Correo:'.$user->email);
		}
		return 'enviado';
	}

	public static function aprobado($user)
	{
		Mail::queue('emails.aprobado',compact('user'),function($msj) use ($user){
				$msj->subject(AUTOR);
				$msj->to($user->email);
		});
		
		Log::info('Enviando Email a '.$user->apellido .' '. $user->nombre.' Correo:'.$user->email);		
		return 'enviado';	
	}
}