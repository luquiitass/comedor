<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadossemanalController
 *
 * @author  The scaffold-interface created at 2016-07-01 02:11:45pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Estadossemanal extends Model
{
    public $timestamps = false;

    protected $table = 'estados_semanal';

    protected $primaryKey = 'id';


    public function user()
    {
    	return $this->belongsTo('App\User')->first();
    }

    public function estadosDias()
    {
    	return ['Lunes' => $this->lunes,'Martes' => $this->martes,'Miercoles' => $this->miercoles,'Jueves' => $this->jueves,'Viernes' => $this->viernes];
    }

    public static function cantAnotadosPorDia(){
        return array(
            'lunes' =>Estadossemanal::where('lunes','1')->count(),
            'martes' => Estadossemanal::where('martes','1')->count(),
            'miercoles' => Estadossemanal::where('miercoles','1')->count(),
            'jueves' => Estadossemanal::where('jueves','1')->count(),
            'viernes' => Estadossemanal::where('viernes','1')->count()
        );
    }

    public function diasAnotado()
    {   
        $retorno= array();
        foreach ($this->toArray() as $key => $value) {
            if(($key != 'id') && ($key != 'user_id') && ($value == 1))
            {
                $retorno[$key]=$value;
            }
        }
        return $retorno;
    }

	
}
