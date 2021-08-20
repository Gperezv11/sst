<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FichaController;
use App\Http\Controllers\PrestadorController;
use App\Http\Controllers\HonorarioController;



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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/ficha', 'App\Http\Controllers\FichaController');
Route::resource('/tablaficha', 'App\Http\Controllers\TablaFichaController');
Route::resource('/controlacceso','App\Http\Controllers\FichaIngresoController');
Route::resource('/estacionamiento','App\Http\Controllers\FichaEstacionamientoController');
ROute::post('/tablaficha/edit','App\Http\Controllers\TablaFichaController@edit');
Route::get('/findComuna','App\Http\Controllers\FichaController@findComuna')->name('findComuna');
Route::resource('/clientev','App\Http\Controllers\ClienteVentaController');
Route::resource('/lnegocionc','App\Http\Controllers\LineaNegociosContabilidadController');
Route::resource('/centrocosto','App\Http\Controllers\CentroCostoContabilidadController');
Route::resource('/proyectoc', 'App\Http\Controllers\ProyectoContabilidadController');
Route::resource('/pautorizado','App\Http\Controllers\PersonalAutorizadoController');
Route::resource('/listadonaves','App\Http\Controllers\ListadoNavesController');
Route::resource('/fondosrendir', 'App\Http\Controllers\FondosRendirController');
Route::resource('/reported', 'App\Http\Controllers\ReporteDiarioController');
Route::resource('/reporta','App\Http\Controllers\ReporteAsistenciaController');
Route::resource('/estador', 'App\Http\Controllers\EstadoResultadoController');
Route::resource('prestador',PrestadorController::class);
Route::resource('honorario',HonorarioController::class);
Route::resource('detallehonorario',Detalle_HonorarioController::class);
Route::get('formatoRut', [PrestadorController::class, 'formatoRut']);
Route::get('rutFinder',[PrestadorController::class, 'rutFinder']);




