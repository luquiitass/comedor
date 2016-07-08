<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Anuncios
 *
 * @author  The scaffold-interface created at 2016-07-06 05:12:50pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Anuncios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('anuncios',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('titulo');
        
        $table->longText('cuerpo');
        
        $table->date('hasta');

        $table->timestamps();

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
        Schema::drop('anuncios');
    }
}
