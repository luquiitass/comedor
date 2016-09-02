<?php

namespace App\Observers;

use App\User;
use Carbon\Carbon;
use Log;

class AuditoriaObserver{

    private $object;

    private $entro = 1;

    public function __construct(){
        Log::info('Constructor' );    }

    public function creating($objeto)
    {
        Log::info('Entro a creating');
    }

    public function created($objeto)
    {
        Log::info('Entro a created');
    }

    public function updating($objeto)
    {
        /*Log::info('Entro a updating');
        //dd($objeto);
        $auditoria = new Auditoria();

        $auditoria->user_id = \Auth::$id;

        $auditoria->$operacion = "update";

        $auditoria->$descripcion = 'Se ha modificado '. $this->modificaciones($objeto) . ' de la tabla ' . $objeto['auditoria']['tabla'];

        $auditoria->fecha = Carbon::now();

        $auditoria->objeto_id = $objeto->id;

        $auditoria->save();*/

        //dd('id:XXX | accion:update | dectipcion:Se ha modificado '. $this->modificaciones($objeto) . ' de la tabla ' . $objeto['auditoria']['tabla'].' | fecha:'.Carbon::now() . ' | objeto:'. $objeto['attribute']['id']);
        //dd($objeto['original']);
        //$this->$objeto = $objeto['original'];
    }

    public function updated($objeto)
    {
        Log::info('Entro a updated');      //dd($this->$objeto);

        //dd('id:XXX | accion:update | dectipcion:modificacion en la tabla '. $objeto['auditoria']['tabla'].' y se ha modificado '.$objeto->modificaciones($this->$objeto). ' | fecha:'.Carbon::now() . ' | objeto:'.$objeto->$id);
    }

    public function saving($objeto)
    {

    }

    public function saved($objeto)
    {
        /*Log::info('Entro a saved');

        $auditoria = new Auditoria();

        $auditoria->user_id = \Auth::$id;

        $auditoria ->$operacion = "save";

        $auditoria ->$descripcion = 'Se ha creado un nuevo' . $objeto['auditoria']['tabla'];

        $auditoria->fecha = Carbon::now();

        $auditoria->objeto_id = $objeto->id;

        $auditoria->save();*/
    }

    public function deleting ($objeto)
    {
        Log::info('Entro a deleting');
    }

    public function deleted ($objeto)
    {
        /*Log::info('Entro a deleted');

        $auditoria = new Auditoria();

        $auditoria->user_id = \Auth::$id;

        $auditoria->$operacion = "save";

        $auditoria->$descripcion = 'Se ha borrado un/a' . $objeto['auditoria']['tabla'] .' = '. $objeto->toString();

        $auditoria->fecha = Carbon::now();

        $auditoria->objeto_id = $objeto->id;

        $auditoria->save();*/
    }

    public function restoring ($objeto)
    {
        Log::info('Entro a restoring');
    }

    public function restored ($objeto)
    {
        Log::info('Entro a restored');
    }

    private function modificaciones($objeto){
        $retorno = '';
        $nuevos = $objeto['attributes'];
        $viejos = $objeto['original'];
        foreach ($viejos as $key => $value) {
            if ($value != $nuevos[$key]) {
                $coma = ($retorno != '')?',':'';
                $retorno = $retorno . $coma .'"'. $key . '":'.$value .' por ' . $nuevos[$key].' ';
            }
        }
        return $retorno;
    }

}