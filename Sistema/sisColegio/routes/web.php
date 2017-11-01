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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('colegio/grados','GradoController');
Route::resource('colegio/cursos','CursoController');
Route::resource('colegio/subareas','SubAreaController');
Route::resource('colegio/horarios','HorarioController');
Route::resource('colegio/horariosver','HorarioverController');
Route::resource('colegio/notas','CalificacionesController');
Route::resource('colegio/notasver','HorarioverController');
Route::resource('colegio/contratos','ContratosController');

Route::resource('estudiantes/alumnos','EstudianteController');
Route::resource('estudiantes/becados','BecadosController');

Route::resource('seguridad/usuarios','UsuarioController');

Route::resource('responsables/encargado','EncargadoController');
Route::resource('responsables/padres','PadresController');

Route::resource('personal/docentes','DocentesController');
Route::resource('personal/registro_escalafonario','RegistroEscalafonarioController');

Route::resource('telefonos/num_telefonos','TelefonosController');
Route::resource('telefonos/telefonos_docentes','telefonosDocentesController');
Route::resource('telefonos/telefonos_encargados','TelefonosEncargadosController');
