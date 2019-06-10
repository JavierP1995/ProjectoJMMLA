<?php

use App\TrabajoTitulacion;
use App\TipoActividadTitulacion;
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
    return view('auth\login');
});

Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');

Route::get('/principal', 'Web\MenuController@principal')->name('principal');


Route::get('/alumnos/recuperacion', 'Admin\AlumnoController@index2')->name('recuperar_alumno');
Route::get('/academico/recuperacion', 'Admin\AcademicoController@index2')->name('recuperar_academico');
Route::get('/tipo-actividad-titulacion/recuperacion', 'Admin\TipoActividadTitulacionController@index2')->name('recuperar_tipo');


//Distintas index de actividad de titulacion
Route::get('/trabajo/autorizar-trabajo', 'Admin\TrabajoTitulacionController@indexAutorizar')->name('autorizar-trabajo');
Route::get('/trabajo/inscripcion-formal', 'Admin\TrabajoTitulacionController@indexInscripcionFormal')->name('inscripcion-formal');
Route::get('/trabajo/registrar-examen', 'Admin\TrabajoTitulacionController@indexRegistrarExamen')->name('registrar-examen');
Route::get('/trabajo/anular-trabajo', 'Admin\TrabajoTitulacionController@indexAnularTrabajo')->name('anular-trabajo');

//Distintos edit de actividad de titulacion que redirigen a la vista correcta
Route::get('/trabajo/inscripcion-formal/{id}','Admin\TrabajoTitulacionController@editInscripcionFormal')->name('inscripcion-formal-edit');
Route::get('/trabajo/registrar-examen/{id}','Admin\TrabajoTitulacionController@editRegistrarExamen')->name('registrar-examen-edit');


//Distintas rutas que se usaran cuando se desee editar la actividad de titulacion
Route::PUT('/trabajo/inscripcion-formal/{id}','Admin\TrabajoTitulacionController@updateInscripcionFormal')->name('inscripcion-formal-actualizar');
Route::PUT('/trabajo/registrar-examen/{id}','Admin\TrabajoTitulacionController@updateRegistrarExamen')->name('registrar-examen-actualizar');

//rutas para AJAX
Route::get('/preguntarOrg/{id}', 'Admin\TipoActividadTitulacionController@tieneOrgEx')->name('tieneOrgEx');
Route::get('/preguntarTutores/{id}', 'Admin\TrabajoTitulacionController@retornarTutores')->name('retornarTutores');
Route::get('/retornarDatos/{id}', 'Admin\TrabajoTitulacionController@retornarDatos')->name('retornarDatos');



//admin

Route::resource('alumnos', 'Admin\AlumnoController');
Route::resource('academicos', 'Admin\AcademicoController');
Route::resource('tiposActividad', 'Admin\TipoActividadTitulacionController');
Route::resource('trabajo', 'Admin\TrabajoTitulacionController');
