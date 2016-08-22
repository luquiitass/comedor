<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class FaltaController
 *
 * @author  The scaffold-interface created at 2016-07-06 04:11:44pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Falta extends Model
{
    public $timestamps = false;

    protected $table = 'faltas';

    protected $fillable = [
        'id', 'fecha','user_id'
    ];

    protected $dates = 
    [
        'fecha'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getFecha()
    {
        $dia = $this->fecha->dayOfWeek;

        $mes = $this->fecha->month;

    	return  trans_choice('mensajes.dia',$dia).' '. $this->fecha->day. ' de ' . trans_choice('mensajes.mes',$mes) . ' , ' . $this->fecha->year;
    }
	
}
