<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*mantenimientos*/
Route::resource('persona','PersonaController');


/*sociallite*/
Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');

/*administracion*/
Route::resource('rol','RolController');
Route::resource('permisos','PermisosController');
Route::resource('permiso-rol','PermisoRolController');
Route::resource('permiso-usuario','UsersController');

Route::resource('producto','ProductoController');
Route::resource('imagen','ImagenController');
Route::resource('imagen-producto','ImagenProductoController');
Route::resource('imagen-categoria','ImagenCategoriaController');

// feeds spatie
//Route::feeds();

