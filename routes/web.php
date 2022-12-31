<?php

use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\PersonaController;
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

$controller_path = 'App\Http\Controllers';

// Main Page Route
//Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');

// layout
Route::get('/', $controller_path . '\layouts\Container@index')->name('layouts-container');


// pages
Route::get('/GestionarPrograma/programas', $controller_path . '\ProgramaController@index')->name('pages-programa.blade');

Route::resource('personas', PersonaController::class);
Route::resource('inscripciones', InscripcionController::class);
Route::get('inscripciones/Programas/{inscripcione}', [InscripcionController::class, 'showProgram'])->name('inscripciones.showProgram');
Route::get('inscripciones/Cursos/{inscripcione}', [InscripcionController::class, 'showCurso'])->name('inscripciones.showCurso');
Route::patch('inscripciones/Programas/{inscripcione}', [InscripcionController::class, 'destroyProgram'])->name('inscripciones.destroyProgram');
Route::patch('inscripciones/Cursos/{inscripcione}', [InscripcionController::class, 'destroyCurso'])->name('inscripciones.destroyCurso');


Route::resource('pagos', PagosController::class);
