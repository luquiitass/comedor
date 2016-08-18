<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Estadossemanal;
use App\Anuncio;

class User extends Authenticatable
{

    public static function valid_reg(){
        return [
        'nombre' => 'required',
        'apellido' => 'required',
        'legajo' => 'required|unique:users',
        'dni' => 'required|unique:users',
        'telefono' => 'required',
        'email' => 'required|email|unique:users',
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nombre','apellido','telefono','legajo','dni','estadosSemenal','estado_id','tipo','imagen'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function getImagen()
    {
        if ( file_exists(public_path().'storage/'.$this->id) ) {
            return public_path().'storage/'.$this->id;
        }
        return public_path().'storage/login2.png'; 
    }

    public function isActivo()
    {
        dd($this->estado->nombre);
        
        if ($this->estado->nombre == 'activo') {
            # code...
        }
    }

    public function isPassword($pass){
        return \Hash::check($pass,$this->password);
    }

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

    public function isAnotado($dia)
    {
        $retorno;
        switch ($dia) {
            case 'lunes':
                $retorno = $this->lunes;
                break;
            case 'martes':
                $retorno = $this->martes;
                break;
            case 'miercoles':
                $retorno = $this->miercoles;
                break;
            case 'jueves':
                $retorno = $this->jueves;
                break;
            case 'viernes':
                $retorno = $this->viernes;
                break;            
            default:
                return false;
                break;
        }
        return $retorno;
    }

    public function tiposDeUsuario()
    {
        if ($this != null) {
            switch ($this->tipo) {
                case 'comensal':
                    return array('comensal'=>'comensal','admin'=>'admin','ambos' => 'ambos');
                case 'admin':
                    return array('admin'=>'admin','comensal'=>'comensal','ambos' => 'ambos');
                case 'ambos':
                    return array('ambos' => 'ambos','comensal'=>'comensal','admin'=>'admin');
            }   
        }else{
            return array('comensal'=>'comensal','admin'=>'admin','ambos' => 'ambos');
        }
    }

    public function mostrarMisDatos()
    {
        return ['Apellido' => $this->apellido, 'Nombre' => $this->nombre, 'Legajo' => $this->legajo, 'Telefono' => $this->telefono, 'DNI' => $this->dni, 'Email' => $this->email];
    }

    public function mostrarMisDatosAjaxis(){
        return [array('key' => 'Apellido' ,'value' => $this->apellido), array('key' => 'Nombre' ,'value' => $this->nombre), array('key' => 'Legajo' ,'value' => $this->legajo), array('key' => 'Telefono' ,'value' => $this->telefono), array('key' => 'DNI' ,'value' => $this->dni), array('key' => 'Email' ,'value' => $this->email)];
    }

    public function editarDatosAjaxis()
    {
        return array(
            ['type' => 'text', 'value' => $this->legajo, 'name' => 'legajo', 'key' => 'Legajo :'],
            ['type' => 'text', 'value' => $this->nombre, 'name' => 'nombre', 'key' => 'Nombre :'],
            ['type' => 'text', 'value' => $this->apellido, 'name' => 'apellido', 'key' => 'Apellido :'],
            ['type' => 'select', 'value' => $this->tiposDeUsuario(), 'name' => 'tipo', 'key' => 'Tipo :']
        );
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

    public function obtenerFaltasPorMes()
    {
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
