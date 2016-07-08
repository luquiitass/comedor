<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Estadossemanals
 *
 * @author  The scaffold-interface created at 2016-07-01 02:11:45pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Estadossemanals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('estados_semanal',function (Blueprint $table){

        $table->increments('id');
        
        $table->boolean('lunes');
        
        $table->boolean('martes');
        
        $table->boolean('miercoles');
        
        $table->boolean('jueves');
        
        $table->boolean('viernes');

        $table->integer('user_id')->unsigned();

        $table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');
        
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
        Schema::drop('estados_semanal');
    }
}
