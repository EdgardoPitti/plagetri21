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

Route::resource('datos/pacientes', 'Datos_PacientesController');
Route::resource('datos/medicos', 'Datos_MedicosController');
Route::resource('datos/citas', 'Datos_CitasController');
Route::resource('datos/pacientesmapas', 'MapasController');
Route::get('provincia','DropdownController@getProvincia');
Route::get('distrito','DropdownController@getDistrito');
Route::get('corregimiento','DropdownController@getCorregimiento');
Route::get('institucion', 'DropdownController@getInstitucion');
Route::get('institucionprovincia', 'DropdownController@getInstitucionprovincia');