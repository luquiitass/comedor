<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;
use Session;

class EmailController extends Controller
{
    //
	public function enviarEmail($mensaje)
	{
		Mail::send('emails.solicitud',compact('mensaje'),function($msj){
			$msj->subject('Prueba de Email con Laravel');
			$msj->to('liquiitass@gmail.com');
		});
		return 'Mensaje enviado ;)';
	}



}
