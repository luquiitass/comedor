<?php

namespace App;

use Mail;

define('AUTOR','Comedor Apóstoles');

Class Email {


	public static function solicitudRegistrada($user)
	{
		$mensaje = 'Hola '.$user->apellido.' '.$user->nombre.' su solicitud ha sido registrada exitosamente, en breve los administradores lo estarán aprobando la solicitud... que se yo... mensajeson copado.';

		Mail::queue('emails.solicitud',compact('mensaje'),function($msj) use ($user){
			$msj->subject(AUTOR);
			$msj->to($user->email);
		});
		return 'enviado';
	}
}