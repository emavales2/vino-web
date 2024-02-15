<?php

use App\Http\Controllers\WineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CellarController;
use App\Http\Controllers\CellarHasWineController;
use App\Http\Controllers\BuyListController;
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
})->name('home');

// Wine
Route::middleware(['auth'])->group(function () {
    Route::get('/wine-search', [WineController::class, 'searchResult'])->name('wine.search');
    Route::get('/wine/{wine}', [WineController::class, 'show'])->name('wine.show');
    Route::get('/wine-create', [WineController::class, 'create'])->name('wine.create');
    Route::post('/wine-create', [WineController::class, 'store'])->name('wine.store');
    Route::get('/wine-edit/{wine}', [WineController::class, 'edit'])->name('wine.edit');;
    Route::put('/wine-edit/{wine}', [WineController::class, 'update']);
    Route::delete('/wine-delete/{wine}', [WineController::class, 'destroy']);

    //cette route est pour tester seulement, ne sera pas présent dans le produit final
    Route::get('/wines', [WineController::class, 'index']);
});


//Cellar
//----------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/cellars', [CellarController::class, 'index'])->name('cellar.index');
    Route::get('/cellar/{cellar}', [CellarController::class, 'show'])->name('cellar.show');
    Route::get('/cellar-create', [CellarController::class, 'create'])->name('cellar.create');
    Route::post('/cellar-create', [CellarController::class, 'store'])->name('cellar.store');
    Route::get('/cellar-edit/{cellar}', [CellarController::class, 'edit'])->name('cellar.edit');
    Route::put('/cellar-edit/{cellar}', [CellarController::class, 'update'])->name('cellar.update');
    Route::delete('/cellar/{cellar}', [CellarController::class, 'destroy'])->name('cellar.delete');
});

//BuyList
//----------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/buy-list', [BuyListController::class, 'index'])->name('buylist.index');
    Route::get('/buy-list-create/{wine}', [BuyListController::class, 'create'])->name('buylist.create');
    Route::post('/buy-list', [BuyListController::class, 'store'])->name('buylist.store');
    Route::delete('/buy-list/{wine}', [BuyListController::class, 'destroy'])->name('buylist.delete');
});

// CellarHasWine
Route::middleware(['auth'])->group(function () {
    Route::get('/cellarwine-create/{wine}', [CellarHasWineController::class, 'create'])->name('cellar-wine.create');
    Route::get('/cellarwine/{cellar}', [CellarHasWineController::class, 'index'])->name('collection');
    Route::get('cellarwine-add/{cellar}/{wine}', [CellarHasWineController::class, 'addOne'])->name('cellarwine.add');
    Route::get('/cellarwine-remove/{cellar}/{wine}', [CellarHasWineController::class, 'removeOne'])->name('cellarwine.remove');
    Route::delete('/cellarwine-delete/{cellar}/{wine}', [CellarHasWineController::class, 'destroy'])->name('cellarwine.delete');
    Route::get('/collection', [CellarHasWineController::class, 'collection'])->name('collection');
});

Route::post('/cellarwine-store', [CellarHasWineController::class, 'store'])->name('cellarwine.store')->middleware('auth');

// User
//----------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile/{user}', [UserController::class, 'show'])->name('profile.show');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/users/edit', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.delete');
});

// Admin
Route::middleware(['admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.adminDelete');
});

// Page d'erreur
Route::get('/error', function () {
    return Inertia::render('ErrorView');
})->name('error.page');

require __DIR__.'/auth.php';
