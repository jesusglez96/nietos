<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

//Middleware Auth comprueba si esta autentificado

Route::get('/', function () {
    return view('welcome');
})->name("welcome");
Route::get('/index', [HomeController::class, "index"])->middleware(['auth'])->name('index');
Route::get('/buy/{id_flight}', [HomeController::class, "buy"])->middleware(['auth'])->name('buy');
Route::get('/show', [HomeController::class, "show"])->middleware(['auth'])->name('show');
Route::get('/remove/{id_travel}', [HomeController::class, "remove"])->middleware(['auth'])->name('remove');

// Middleware Admin comprueba si es administrador

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/create', [AdminController::class, "create"])->name("create");
    Route::post('/admin/store', [AdminController::class, "store"])->name("store");
    Route::get('/admin/modify/{id_flight}', [AdminController::class, "modify"])->name("modify");
    Route::post('/admin/edit', [AdminController::class, "edit"])->name("edit");
    Route::get('/admin/delete/{id_flight}', [AdminController::class, "delete"])->name("delete");
});


require __DIR__ . '/auth.php';
