<?php 

namespace App;

class Funciones
{
	public static function getDias()
	{
		return array("domingo","lunes","martes","miercoles","jueves","viernes","sabado");
	}

	public static function fechaActual_FS(){
		$time=time();
    	return date("Y-m-d", $time);
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

	public static function getJSON(){
		$param = func_get_args();
		$num = func_num_args();
		$retorno=array();

		switch ($num) {
			case 1:
				$retorno=Funciones::getJSON_resultado($retorno,$param[0]);
				break;
			case 2:
				$retorno=Funciones::getJSON_resultado($retorno,$param[0]);
				$retorno=Funciones::getJSON_mensaje($retorno,$param[1]); 
				break;
			case 3:
				$retorno=Funciones::getJSON_resultado($retorno,$param[0]);
				$retorno=Funciones::getJSON_mensaje($retorno,$param[1]);
				$retorno=Funciones::getJSON_funcion($retorno,$param[2]);
				break;
			case 4:
				$retorno=Funciones::getJSON_resultado($retorno,$param[0]);
				$retorno=Funciones::getJSON_mensaje($retorno,$param[1]);
				$retorno=Funciones::getJSON_funcion($retorno,$param[2]);
				$retorno=Funciones::getJSON_idElemnto($retorno,$param[3]); 
				break;
			case 5:
				$retorno=Funciones::getJSON_resultado($retorno,$param[0]);
				$retorno=Funciones::getJSON_mensaje($retorno,$param[1]);
				$retorno=Funciones::getJSON_funcion($retorno,$param[2]);
				$retorno=Funciones::getJSON_idElemnto($retorno,$param[3]);
				$retorno=Funciones::getJSON_html($retorno,$param[4]); 
				break;
			case 6:
				$retorno=Funciones::getJSON_resultado($retorno,$param[0]);
				$retorno=Funciones::getJSON_mensaje($retorno,$param[1]);
				$retorno=Funciones::getJSON_funcion($retorno,$param[2]);
				$retorno=Funciones::getJSON_idElemnto($retorno,$param[3]);
				$retorno=Funciones::getJSON_html($retorno,$param[4]);
				$retorno=Funciones::getJSON_refistros($retorno,$param[5]); 
				break;
			default:
				$retorno[]="demaciados parametrs, se admiten 5";
				break;
		}
		return json_encode($retorno,true);
	}

	public static function getJSON_resultado($arr,$resultado){
		$arr =(is_array($arr)) ? $arr : array();
		return array_merge($arr, array('resultado' => $resultado));
	}


	public static function getJSON_mensaje($arr,$mensaje){
		$arr =(is_array($arr)) ? $arr : array();
		return array_merge($arr, array('mensaje' => $mensaje));
	}

	public static function getJSON_idElemnto($arr,$id_elemento){
		$arr =(is_array($arr)) ? $arr : array();
		return array_merge($arr, array('id_elemento' => $id_elemento));
	}
	public static function getJSON_html($arr,$html){
		$arr =(is_array($arr)) ? $arr : array();
		return array_merge($arr, array('html' => $html));
	}
	public static function getJSON_refistros($arr,$registros){
		$arr =(is_array($arr)) ? $arr : array();
		return array_merge($arr, array('registros' => $registros));
	}
	public static function getJSON_funcion($arr,$funcion){
		$arr =(is_array($arr)) ? $arr : array();
		return array_merge($arr, array('funcion' => $funcion));
	}
	public static function getJSON_add_array($array=array(),$json)
	{
		return json_encode( array_merge($array,json_decode($json,true)));
	}
}