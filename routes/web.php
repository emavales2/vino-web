<?php

use App\Http\Controllers\WineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CellarController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('HomeView');
});
Route::get('/testwine', [WineController::class, 'index']);
Route::get('/testsearch', [WineController::class, 'searchResult']);

//Cellar
//----------------------------------------------------
Route::get('/cellars', [CellarController::class, 'index'])->name('cellar.index');
Route::get('/cellar/{cellar}', [CellarController::class, 'show'])->name('cellar.show');
Route::get('/cellar-create', [CellarController::class, 'create'])->name('cellar.create');
Route::post('/cellar-create', [CellarController::class, 'store'])->name('cellar.store');
Route::get('/cellar-edit/{cellar}', [CellarController::class, 'edit'])->name('cellar.edit');
Route::put('/cellar-edit/{cellar}', [CellarController::class, 'update'])->name('cellar.edit');
Route::delete('/cellar/{cellar}', [CellarController::class, 'destroy'])->name('cellar.delete');

// User
//----------------------------------------------------
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile/{user}', [UserController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit/{user}', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [UserController::class, 'update'])->name('profile.update');
});
// Admin
//----------------------------------------------------
Route::group(['middleware' => 'admin'], function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.delete');
});
Route::get('/error-page', [UserController::class, 'errorPage'])->name('error.page');

require __DIR__.'/auth.php';
