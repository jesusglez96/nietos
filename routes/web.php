<?php

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


Route::get('/', [HomeController::class, "welcome"])->name("welcome");
Route::get('/index', [HomeController::class, "index"])->middleware(['auth'])->name('index');
Route::get('/show', [HomeController::class, "show"])->middleware(['auth'])->name('show');
Route::get('/buy/{id}', [HomeController::class, "buy"])->middleware(['auth'])->name('buy');
Route::get('/remove/{id}', [HomeController::class, "remove"])->middleware(['auth'])->name('remove');


Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/create', [HomeController::class, "create"])->name("create");
    Route::post('/admin/store', [HomeController::class, "store"])->name("store");
    Route::get('/admin/modify', [HomeController::class, "modify"])->name("edit");
    Route::get('/admin/delete/{id}', [HomeController::class, "delete"])->name("delete");
});


require __DIR__ . '/auth.php';
