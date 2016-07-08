<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	if (\Auth::check()) {
		$user= \Auth::user();
		return view('users.home',compact('user'));
	}
    return redirect()->route('login');
});


Route::get('/login',['as' => 'login' , 'uses' => 'AuthController@login']);
Route::post('/handleLogin',['as' => 'handleLogin' , 'uses' => 'AuthController@handleLogin']);
Route::get('/logout',['as' => 'logout' , 'uses' => 'AuthController@logout']);


Route::resource('user','UsersController', ['only' => ['create' , 'store',]] );





Route::group(['middleware' => ['web']],function(){
	//Route::post('/handleLogin',['as' => 'handleLogin' , 'uses' => 'AuthController@handleLogin']);
	//Route::get('/logout',['as' => 'logout' , 'uses' => 'AuthController@logout']);


	//Route::get('/home/',['middlewaer' => 'auth' ,'as' => 'home' , 'uses' => 'UsersController@home']);

	//Route::resource('users','UsersController', ['only' => ['create' , 'store','home']] );

	//Route::resource('user','UsersController');

	//Route::resource('user','UsersController', ['only' => ['index' , 'home','show']] );


});


//estados Resources
/********************* estados ***********************************************/

Route::resource('/estado','\App\Http\Controllers\EstadossemanalController');
Route::post('estado/{id}/update','\App\Http\Controllers\EstadossemanalController@update');
Route::get('estado/{id}/delete','\App\Http\Controllers\EstadossemanalController@destroy');
Route::get('estado/{id}/deleteMsg','\App\Http\Controllers\EstadossemanalController@DeleteMsg');
/********************* estados ***********************************************/

//estados Resources
/********************* estados ***********************************************/

Route::resource('/user','\App\Http\Controllers\UsersController');
Route::post('user/modificarEstadoUsuario','UsersController@modificarEstadoUsuario');
//Route::post('user/{id}/update','\App\Http\Controllers\UsersController@update');
//Route::get('user/{id}/delete', '\App\Http\Controllers\UsersController@destroy');
//Route::get('user/{id}/deleteMsg','\App\Http\Controllers\UsersController@DeleteMsg');
/********************* estados ***********************************************/


//falta Resources
/********************* falta ***********************************************/
Route::resource('falta','\App\Http\Controllers\FaltaController');
Route::get('{id}/faltas','\App\Http\Controllers\FaltaController@faltas');
Route::post('falta/{id}/update','\App\Http\Controllers\FaltaController@update');
Route::get('falta/{id}/delete','\App\Http\Controllers\FaltaController@destroy');
Route::get('falta/{id}/deleteMsg','\App\Http\Controllers\FaltaController@DeleteMsg');
/********************* falta ***********************************************/


//anuncio Resources
/********************* anuncio ***********************************************/
Route::resource('anuncio','\App\Http\Controllers\AnuncioController');
Route::get('{id}/anuncios','AnuncioController@anuncios');
Route::post('anuncio/{id}/update','\App\Http\Controllers\AnuncioController@update');
Route::get('anuncio/{id}/delete','\App\Http\Controllers\AnuncioController@destroy');
Route::get('anuncio/{id}/deleteMsg','\App\Http\Controllers\AnuncioController@DeleteMsg');
/********************* anuncio ***********************************************/


//estado_usuario Resources
/********************* estado_usuario ***********************************************/
Route::resource('estado_usuario','\App\Http\Controllers\Estado_usuarioController');
Route::post('estado_usuario/{id}/update','\App\Http\Controllers\Estado_usuarioController@update');
Route::get('estado_usuario/{id}/delete','\App\Http\Controllers\Estado_usuarioController@destroy');
Route::get('estado_usuario/{id}/deleteMsg','\App\Http\Controllers\Estado_usuarioController@DeleteMsg');
/********************* estado_usuario ***********************************************/

