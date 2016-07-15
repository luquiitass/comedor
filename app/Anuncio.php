<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnuncioController
 *
 * @author  The scaffold-interface created at 2016-07-06 05:12:50pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Anuncio extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'titulo', 'cuerpo','hasta','user_id'
    ];

    protected $table = 'anuncios';

	public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getFechaCreado()
    {
    	return date('j/m/Y H:i',strtotime($this->created_at));
    }

    public function getFechaHasta()
    {
    	return date('d/m/Y',strtotime($this->hasta));
    }
}
