<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Estadossemanal;
use App\Anuncio;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nombre','apellido','telefono','legajo','dni','estadosSemenal','estado_id','tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        if ($this->tipo == 'admin' || $this->tipo == 'ambos') {
            return true;
        }
        return false;
    }

    public function isComensal()
    {
        if ($this->tipo == 'comensal' || $this->tipo == 'ambos') {
            return true;
        }
        return false;
    }


    public function mostrarMisDatos(){
        return ['Apellido' => $this->apellido, 'Nombre' => $this->nombre, 'Legajo' => $this->legajo, 'Telefono' => $this->telefono, 'DNI' => $this->dni, 'Email' => $this->email];
    }

    public function estadosSemanal()
    {
        return $this->hasOne(Estadossemanal::class)->first();
    }

    public function faltas()
    {
        return $this->hasMany(Falta::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado_usuario::class);
    }

    public function anuncios()
    {
        return $this->hasMany(Anuncio::class);
    }

    public function obtenerFaltasPorMes(){
        $faltas = $this->faltas()->get();
        setlocale(LC_TIME,"es_ES");

        $datos = $faltas->map(function($item,$key){
            $fecha = $item['fecha'];
            $mes = date('M',strtotime($fecha));
            $item['mes'] = $mes;
            return $item;
        })->groupBy('mes');
        return $datos;
    }

    public function obtenerFaltasMesActual()
    {
        $mesActual=date('M');
        $faltas=$this->obtenerFaltasPorMes();
        if ($faltas->has($mesActual)) {
            return $faltas[$mesActual];
        }
        return collect();

    }
            
}
