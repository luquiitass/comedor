<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Faltas
 *
 * @author  The scaffold-interface created at 2016-07-06 04:11:44pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Faltas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('faltas',function (Blueprint $table){

        $table->increments('id');
        
        $table->date('fecha');
        
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
        Schema::drop('faltas');
    }
}
