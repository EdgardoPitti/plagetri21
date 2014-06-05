<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('inicio');
});
//Rutas para controladores
Route::resource('datos/pacientes', 'Datos_PacientesController');
Route::resource('datos/medicos', 'Datos_MedicosController');
Route::resource('datos/citas', 'Datos_CitasController');
//Ruta para el control del mapa
Route::resource('datos/pacientesmapas', 'MapasController');
//Rutas para elementos dinamicos
Route::get('datos/marcadores', 'DropdownController@marcadores');
Route::get('distrito','DropdownController@getDistrito');
Route::get('corregimiento','DropdownController@getCorregimiento');
Route::get('institucion', 'DropdownController@getInstitucion');
Route::get('institucionprovincia', 'DropdownController@getInstitucionprovincia');
Route::get('calculo', 'DropdownController@getMomMarcador');