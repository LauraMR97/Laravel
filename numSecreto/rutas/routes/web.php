<?php

use App\Http\Controllers\miControlador;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[miControlador::class,'irIndice']);
Route::get('otra',[miControlador::class,'irOtra']);
Route::post('calcular',[miControlador::class,'calcularValor']);

Route::get('adivina',[miControlador::class,'verAdivinar']);
Route::post('adivinar',[miControlador::class,'adivinarNumero']);
Route::get('VolverAdivinar',[miControlador::class,'verAdivinar']);
