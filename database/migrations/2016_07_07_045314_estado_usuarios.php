<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Estado_usuarios
 *
 * @author  The scaffold-interface created at 2016-07-07 04:53:14pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class EstadoUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('estado_usuarios',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('descripcion');
        
        /**
         * Foreignkeys section
         */
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('estado_usuarios');
    }
}
