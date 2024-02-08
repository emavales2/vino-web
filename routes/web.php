<?php

use App\Http\Controllers\WineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CellarController;
use App\Http\Controllers\CellarHasWineController;
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
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware(['auth']);
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/profile/{user}', [UserController::class, 'show'])->name('users.show')->middleware(['auth']);
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/edit', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.delete');


require __DIR__.'/auth.php';
