<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado_usuarioController
 *
 * @author  The scaffold-interface created at 2016-07-07 04:53:14pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Estado_usuario extends Model
{
    public $timestamps = false;

    protected $auditoria = [
        'tabla'=>'Estados de usuario'
    ];
    protected $table = 'estado_usuarios';

    protected $fillable = ['id','nombre','descripcion'];

    public function users(){
    	return $this->hasMany(User::class,'estado_id','id');
    }

    public function getEstadosAjaxis()
    {	
    	$retorno = array();
    	
    	$estados = Estado_usuario::where('nombre','!=',$this->nombre)->get();
    	
    	$retorno[$this->id]= $this->nombre;

    	foreach ($estados as $value) {
    		$retorno[$value->id] = $value->nombre ;
    	}

    	return $retorno;
    }

    public function toString()
    {
        return 'Id:' . $this->id . ',Nombre:' . $this->nombre . ',Descripción:' . $this->descripcion;
    }

	
}
