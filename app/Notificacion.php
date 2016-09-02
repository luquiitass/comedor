<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    //
    public $timestamps = true;

    protected $fillable = [
        'id', 'faltas','anuncios','estados','solicitudes','aprobados','user_id'
    ];

    protected $table = 'notificaciones';

    protected $dates =
    [
        'created_at','updated_at'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
