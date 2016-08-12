<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application_
| It's a breeze_ Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested_
|
*/

Route::get('/', function () {
	if (\Auth::check()) {
		if (\Auth::user()->isAdmin()) {
			return redirect()->route('admin_admin');
		}else{
			return redirect()->route('user_inicio');
		}
	}
    return redirect()->route('login');
});

Route::get('/prueba',function(){
	return view('prueba');
	}
);


/* *******************auth**********************************************/
Route::get('/login',['as' => 'login' , 'uses' => 'AuthController@login']);
Route::post('/handLogin',['as' => 'handLogin' , 'uses' => 'AuthController@handLogin']);
Route::get('/logout',['as' => 'logout' , 'uses' => 'AuthController@logout']);
Route::get('/pendiente',['as'=>'pendiente', 'uses'=>'AuthController@pendiente']);
Route::get('/inactivo',['as'=>'inactivo', 'uses'=>'AuthController@inactivo']);


/**************************************************************************/



//estados Resources
/********************* estados ***********************************************/

Route::resource('/estado','\App\Http\Controllers\EstadossemanalController');
Route::get('ver_estados',['as' => 'user_estados', 'uses' => 'EstadossemanalController@index']);
Route::post('estado/{id}/update','\App\Http\Controllers\EstadossemanalController@update');
Route::get('estado/{id}/delete','\App\Http\Controllers\EstadossemanalController@destroy');
Route::get('estado/{id}/deleteMsg','\App\Http\Controllers\EstadossemanalController@DeleteMsg');
Route::get('anotados', ['as'=> 'admin_anotados','uses'=> 'EstadossemanalController@anotados']);
/********************* estados ***********************************************/




//estados Resources
/********************* estados ***********************************************/
Route::resource('/user','UsersController');
Route::get('ver_inicio',['as' => 'user_inicio', 'uses' => 'UsersController@inicio']);
Route::post('user/modificarEstadoUsuario','UsersController@modificarEstadoUsuario');
Route::get('editar_datos',['as' => 'user_edit','uses' => 'UsersController@editarDatos']);

Route::post('user/modificarPassword',['as' => 'modificarPassword' ,'uses' => 'UsersController@modificarPassword']);
Route::post('/user/resetPasword',['as' => 'resetPassword' ,'uses' => 'UsersController@resetPassword']);
Route::post('user/userUpdate',['as' => 'userUpdate' ,'uses' => 'UsersController@userUpdate']);
Route::post('user/store','UsersController@store');
Route::get('user/{id}/edit','UsersController@edit');
Route::post('user/{id}/update','UsersController@update');
Route::get('user/{id}/destroy',['as' => 'userDestroy','uses' => 'UsersController@destroy']);
Route::get('user/{id}/deleteMsg','UsersController@DeleteMsg');

Route::get('solicitud',['as'=>'solicitud','uses'=>'UsersController@solicitud']);
Route::post('storeSolicitud',['as'=>'storeSolicitud','uses'=>'UsersController@storeSolicitud']);

Route::get('usuarios',['as' => 'admin_users', 'uses' => 'UsersController@index']);
//Route::post('user/{id}/update','\App\Http\Controllers\UsersController@update');
//Route::get('user/{id}/delete', '\App\Http\Controllers\UsersController@destroy');
//Route::get('user/{id}/deleteMsg','\App\Http\Controllers\UsersController@DeleteMsg');
/********************* estados ***********************************************/


//falta Resources
/********************* falta ***********************************************/
Route::resource('falta','\App\Http\Controllers\FaltaController');
Route::get('ver_faltas',['as' => 'user_faltas', 'uses' => 'FaltaController@index']);

Route::get('faltas',['as' => 'admin_faltas', 'uses' => 'FaltaController@faltas']);



Route::get('{id}/faltas','\App\Http\Controllers\FaltaController@faltas');
Route::post('falta/{id}/update','\App\Http\Controllers\FaltaController@update');
Route::post('falta/setFaltas','FaltaController@setFaltas');
Route::get('falta/{id}/delete','\App\Http\Controllers\FaltaController@destroy');
Route::get('falta/{id}/deleteMsg','\App\Http\Controllers\FaltaController@DeleteMsg');
/********************* falta ***********************************************/


//anuncio Resources
/********************* anuncio ***********************************************/
Route::resource('anuncio','AnuncioController');
Route::get('ver_anuncios',['as' => 'user_anuncios', 'uses' => 'AnuncioController@index']);

Route::get('anuncios',['as' => 'admin_anuncios', 'uses' => 'AnuncioController@anuncios']);

Route::post('anuncio/{id}/update','AnuncioController@update');
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

//Resources de ControllerAdmin
Route::resource('admin','AdminController');
Route::get('admin',['as' => 'admin_admin', 'uses' => 'AdminController@index']);



//*******************  OTROS  ***********************************/

Route::post('image/save','ImageController@save');



/*:::::::::::::::::::::::Rutas de Contolador DataTable::::::::::::::::::::::*/
Route::get('datatables/getViewUsers',['as'=>'dt_getViewUsers','uses'=>'DataTablesController@getViewUsers' ]);
Route::get('datatables/getUsers',['as'=>'dt_getUsers','uses'=>'DataTablesController@getUsers' ]);
