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
        'titulo', 'cuerpo','hasta','user_id','created_at',
    ];

    protected $table = 'anuncios';

    protected $dates =
    [
        'hasta'
    ];

    public function editarDatosAjaxis(){
        return array(
            ['type' => 'text', 'value' => $this->titulo, 'name' => 'titulo', 'key' => 'Titulo :'],
            ['type' => 'textArea', 'value' => $this->cuerpo, 'name' => 'cuerpo', 'key' => 'Cuerpo :'],
            ['type' => 'date', 'value' => $this->getFechaHasta(), 'name' => 'hasta', 'key' => 'Visible hasta :'],
        );
    }

	public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getFechaCreado()
    {
    	return $this->created_at->diffForHumans();
    }

    public function getFechaHasta()
    {
    	return $this->hasta->formatLocalized('%d/%m/%Y');  ;
    }
}
