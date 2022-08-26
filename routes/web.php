<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ClaveEmergenciaController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\FichaClinicaController;
use App\Http\Controllers\ActivacionController;
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
    return view('login');
})->name('inicio');

Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/login',[UsuarioController::class,'showLogin'])
	->name('usuario.login');
Route::post('/login',[UsuarioController::class,'login'])
	->name('usuario.login');
Route::get('/logout',[UsuarioController::class,'logout'])
	->name('usuario.logout');

Route::prefix('rrhh')->middleware(['auth','role:rrhh'])->group(function () {
    Route::get('/usuario/all',[UsuarioController::class,'showUsuario'])
	->name('usuario.all');
    Route::get('/conductor/all',[UsuarioController::class,'showConductor'])
	->name('conductor.all');
    Route::get('/conductor',[UsuarioController::class,'indexConductor'])
	->name('conductor.index');
    Route::get('/conductor/{conductor}/myvehiculo',[UsuarioController::class,'myVehiculo'])
	->name('conductor.show');
    Route::get('/usuario/{usuario}/myespecialidad',[UsuarioController::class,'myEspecialidades'])
	->name('usuario.especialidad');
    Route::get('/usuario/{usuario}/permisos',[UsuarioController::class,'permisoUsuario'])
	->name('usuario.rol');
    Route::put('/conductor/{conductor}',[UsuarioController::class,'updateConductor'])
	->name('conductor.update');
    Route::put('/usuario/{usu}/esp',[UsuarioController::class,'updateEspecialidad'])
	->name('usuario.updateesp');
    Route::put('/usuario/{usu}/rol',[UsuarioController::class,'updatePermiso'])
	->name('usuario.updaterol');
    Route::resource('usuario', UsuarioController::class);
});

Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/vehiculo/all',[VehiculoController::class,'showVehiculos'])
	->name('vehiculo.all');
    Route::get('/clave/all',[ClaveEmergenciaController::class,'showClaves'])
	->name('clave.all');
    Route::get('/especialidad/all',[EspecialidadesController::class,'showEspecialidades'])
	->name('especialidad.all');
    Route::get('/clave/abono',[ClaveEmergenciaController::class,'showAbonos'])
	->name('clave.abono');
    Route::post('/clave/abono',[ClaveEmergenciaController::class,'seetAbono'])
	->name('clave.setabono');
    Route::get('/ficha/enfermedad',[FichaClinicaController::class,'showEnfermedades'])
	->name('enfermedad.all');
    Route::get('/ficha/enfermedad/new',[FichaClinicaController::class,'newEnfermedad'])
	->name('enfermedad.new');
    Route::post('/ficha/enfermedad/new',[FichaClinicaController::class,'setEnfermedad'])
	->name('enfermedad.setenfermedad');
    Route::get('/ficha/enfermedad/{id}/usuario',[FichaClinicaController::class,'showEnfermedadUsuarios'])
	->name('enfermedad.usuario');

    Route::resource('vehiculo', VehiculoController::class);
    Route::resource('clave', ClaveEmergenciaController::class);
    Route::resource('especialidad', EspecialidadesController::class);
    Route::resource('ficha', FichaClinicaController::class);
});
    

    Route::get('/activacion/{id}/{veh}/{estado}',[ActivacionController::class,'activacion'])
	->name('activacion.activacion')->middleware('auth','role:activacion');
    Route::get('/activacion/{id}/{estado}',[ActivacionController::class,'tipoConductor'])
	->name('activacion.tipo')->middleware('auth','role:activacion');
    Route::resource('activacion', ActivacionController::class,['middleware' => ['role:activacion', 'auth']]);
