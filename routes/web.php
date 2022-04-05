<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;

//agreagmos los controladors de permisos y roles
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ObjetivosController;
use App\Http\Controllers\EvaluadoresController;
use App\Http\Controllers\AspectosController;
use App\Http\Controllers\PreguntaAspectoObjetivoController;

Route::get('/test', function () {
    return view('home');
});


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/menu', function () {
    return view('Objetivos.menu');
})->name('menu');






Route::group(['middleware' => ['auth']], function(){
    // -------------------------- ROLES --------------------------
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('carreras', CarreraController::class);
    Route::resource('evaluadores', EvaluadoresController::class);
    Route::resource('aspectosObjetivos', AspectosController::class);
    Route::resource('preguntaAspectosObjetivos', PreguntaAspectoObjetivoController::class);
    
    Route::post('/agregarUsuario/{id}', [App\Http\Controllers\CarreraController::class, 'agregar_usuario'])->name('agregarUser');
    Route::delete('/eliminarAtributo/{id}', [App\Http\Controllers\CarreraController::class, 'eliminarAtributo'])->name('eliminarAtributo');
    Route::delete('/eliminarObjetivo/{id}', [App\Http\Controllers\CarreraController::class, 'eliminarObjetivo'])->name('eliminarObjetivo');
    
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();


Auth::routes();
Route::resource('ObjetivoEducacional', ObjetivosController::class);
