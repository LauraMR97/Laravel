<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\miControlador;

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

Route::get('/', [miControlador::class, 'irIndice']);
Route::post('loggear', [miControlador::class, 'Login']);
Route::post('registrando', [miControlador::class, 'Registro']);
Route::post('generarPersonas', [miControlador::class, 'generarPersonas']);
Route::post('gestionarTemas', [miControlador::class, 'gestionarTemas']);
Route::post('addTema', [miControlador::class, 'aniadirTemaNuevo']);
Route::post('temas', [miControlador::class, 'verYBorrarTemas']);
Route::post('volverDeTema', [miControlador::class, 'volverDeTemaAbierto']);
Route::post('comentarios', [miControlador::class, 'ventanaRespuesta']);
Route::post('crearRespuesta', [miControlador::class, 'addRespuesta']);
