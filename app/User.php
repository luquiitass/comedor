<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Estadossemanal;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nombre','apellido','telefono','legajo','dni','estadosSemenal','estado_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function mostrarMisDatos(){
        return ['Apellido' => $this->apellido, 'Nombre' => $this->nombre, 'Legajo' => $this->legajo, 'Telefono' => $this->telefono, 'DNI' => $this->dni, 'Email' => $this->email];
    }

    public function estadosSemenal()
    {
        return $this->hasOne(Estadossemanal::class)->first();
    }

    public function faltas()
    {
        return $this->hasMany(Falta::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado_usuario::class)->first();
    }
            
}
