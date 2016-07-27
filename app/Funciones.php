<?php 

namespace App;

class Funciones
{
	public static function getDias()
	{
		return array("domingo","lunes","martes","miercoles","jueves","viernes","sabado");
	}

	public static function str_mañanaEs(){
		$dias = Funciones::getDias();
		return $dias[Funciones::int_mañanaEs()];
	}

	public static function int_mañanaEs()
	{	if (date('w')+1 == 7) {
			return 0;
		}
		return date('w')+1;
	}
	
	public static function str_hoyES(){
		$dias = Funciones::getDias();
		return $dias[Funciones::int_hoyEs()];
	}

	public static function int_hoyEs()
	{
		return date('w');
	}
}