<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;

//agreagmos los controladors de permisos y roles
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ObjetivosController;
use App\Http\Controllers\AtributosController;
use App\Http\Controllers\EvaluadoresController;
use App\Http\Controllers\AspectosController;
use App\Http\Controllers\AsignarEncuestasController;
use App\Http\Controllers\ContestarEncuestaController;
use App\Http\Controllers\AspectosAtributosController;
use App\Http\Controllers\ResidentesController;
use App\Http\Controllers\PreguntaAspectoAtributoController;
use App\Http\Controllers\FormularioResidentesController;
use App\Http\Livewire\Atributos\AspectosAtributosComponent;
use App\Http\Livewire\Estadisticas\EstadisticasComponent;

use App\Http\Controllers\PreguntaAspectoObjetivoController;

use App\Http\Controllers\GrupoInteresController;
Route::get('/test', function () {
    return view('home');
});


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/menu', function () {
    return view('Objetivos.menu');
})->name('menu');

Route::get('/formularioResidentes', function () {
    return view('Residentes.formulario');
})->name('formularioResidentes');

// RECUPERAR CONTRASEÑA
// PASO 1 - rederizamos blade para que ingrese su correo
Route::get('/correoRecuperar', function () {
    return view('contraseñas.formulario-correo-contraseña');
})->name('recuperarContraseña');
// PASO 2 - con esta ruta generamos le correo de recuperacion 
Route::post('/correoRecuperar', [App\Http\Controllers\CambiarContraseñaController::class, 'enviarCorreoRecuperacion'])->name('recuperarContraseñaCorreo');

Route::get('/recuperarContraseña/{token}', [App\Http\Controllers\CambiarContraseñaController::class, 'cambiarContraseñaBlade'])->name('ingresarNuevaContraseña');
Route::post('/recuperarContraseña', [App\Http\Controllers\CambiarContraseñaController::class, 'cambiarContraseña'])->name('cambiarNuevaContraseña');


// -------------------------------------------

Route::resource('formularioResidentes', FormularioResidentesController::class);

Route::group(['middleware' => ['auth']], function(){
    // -------------------------- ROLES --------------------------
    Route::resource('roles', RolController::class);
    // prueba de buscador
    Route::get('/buscador', [App\Http\Controllers\RolController::class, 'buscador'])->name('buscador');
    Route::get('/ind', [App\Http\Controllers\RolController::class, 'index'])->name('ind');

    Route::resource('usuarios', UsuarioController::class);
    Route::resource('carreras', CarreraController::class);
    Route::resource('Atributos', AtributosController::class);
    Route::resource('evaluadores', EvaluadoresController::class);
    Route::resource('aspectosObjetivos', AspectosController::class);
    Route::resource('preguntaAspectosObjetivos', PreguntaAspectoObjetivoController::class);
    Route::post('/cambiarpsw/{id}', [App\Http\Controllers\UsuarioController::class, 'cambiar'])->name('cambiar');
    Route::resource('encuestas', AsignarEncuestasController::class);
    Route::post('/crearEncuesta', [App\Http\Controllers\AsignarEncuestasController::class, 'crearEncuesta'])->name('crearEncuesta');
    Route::post('/verRespuestas', [App\Http\Controllers\AsignarEncuestasController::class, 'verRespuestas'])->name('verRespuestas');
    Route::resource('contestarEncuestas', ContestarEncuestaController::class);
    Route::resource('residentes', ResidentesController::class);
    
    Route::post('/agregarUsuario/{id}', [App\Http\Controllers\CarreraController::class, 'agregar_usuario'])->name('agregarUser');
    Route::post('/eliminarUsuarioCarrera/{idUsuario}/{idCarrera}', [App\Http\Controllers\CarreraController::class, 'eliminarUsuarioCarrera'])->name('eliminarUsuarioCarrera');
    Route::delete('/eliminarAtributo/{id}', [App\Http\Controllers\CarreraController::class, 'eliminarAtributo'])->name('eliminarAtributo');
    Route::delete('/eliminarObjetivo/{id}', [App\Http\Controllers\CarreraController::class, 'eliminarObjetivo'])->name('eliminarObjetivo');
    Route::resource('ObjetivoEducacional', ObjetivosController::class);
    Route::resource('GrupodeInteres', GrupoInteresController::class);
    Route::resource('ObjetivoEducacional', ObjetivosController::class);
    Route::resource('AspectosAtributos', AspectosAtributosController::class);
    Route::resource('PreguntaAspectosAtributos', PreguntaAspectoAtributoController::class);

    
    
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/live', AspectosAtributosComponent::class);
Auth::routes();

Route::get('/estadisticas', EstadisticasComponent::class)->name('estadisticas');
// php artisan db:seed --class=SeederTablaPermisos
// php artisan db:seed --class=SuperAdminSeeder