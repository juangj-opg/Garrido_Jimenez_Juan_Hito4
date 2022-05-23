<?php

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

use App\Models\Incidencias;
use App\Models\Users;

Route::get('/', function () {
    $data['incidencias_abiertas'] = Incidencias::where('state', 'new')->count() + Incidencias::where('state', 'open')->count();
    $data['incidencias'] = Incidencias::count();
    $data['users'] = Users::count();
    return view('welcome', ['data' => $data]);
});

require __DIR__.'/auth.php';


use App\Http\Controllers\IncidenceController;

Route::get('/incidences', [IncidenceController::class, 'index'])->middleware(['auth']);

Route::get('/openIncidences/{id_user}', [IncidenceController::class, 'openIncidences'])->middleware(['auth']);;

// CRUD Operations
Route::get('/infoIncidence/{id_incidencia}', [IncidenceController::class, 'infoIncidence'])->middleware(['auth']);;

Route::get('/newIncidence', [IncidenceController::class, 'newIncidence'])->middleware(['auth']);;
Route::post('/newIncidence', [IncidenceController::class, 'storeIncidence'])->middleware(['auth']);;

Route::get('/editIncidence/{id_incidencia}', [IncidenceController::class, 'wipIncidence'])->middleware(['auth']);;

Route::get('/deleteIncidence/{id_incidencia}', [IncidenceController::class, 'wipIncidence'])->middleware(['auth']);;


use App\Http\Controllers\UsersController;

Route::get('/users', [UsersController::class, 'index'])->middleware(['auth']);;

Route::get('/datosPersonales/{id}', [UsersController::class, 'infoUser'])->middleware(['auth']);;

// CRUD Operations
Route::get('/infoUser/{id}', [UsersController::class, 'infoUser'])->middleware(['auth']);;

Route::get('/editUser/{id_user}', [UsersController::class, 'wip'])->middleware(['auth']);;

Route::get('/deleteUser/{id_user}', [UsersController::class, 'wip'])->middleware(['auth']);;


