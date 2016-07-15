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


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getFecha()
    {
    	return date('d/M/Y',strtotime($this->fecha));
    }
	
}
