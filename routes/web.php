<?php

use App\Http\Controllers\WineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CellarController;
use App\Http\Controllers\CellarHasWineController;
use App\Http\Controllers\BuyListController;
use App\Http\Controllers\LocaleController;
use App\Models\BuyList;
use App\Providers\WineProvider;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\App;
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

// Page accueil
Route::get('/', function () {
    return Inertia::render('HomeView');
})->name('home');

// Routes Admin
//----------------------------------------------------
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/admin/{user}', [UserController::class, 'destroy'])->name('admin.delete');
});

// Routes Auth(utilisateur connecté)
//----------------------------------------------------
Route::middleware(['auth'])->group(function () {

    // User
    //----------------------------------------------------
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile/{user}', [UserController::class, 'show'])->name('profile.show');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/users/edit', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.delete');

    // Wine
    //----------------------------------------------------
    Route::get('/wine-search', [WineController::class, 'searchResult'])->name('wine.search');
    Route::get('/wine/{wine}', [WineController::class, 'show'])->name('wine.show');
    Route::get('/wine-create', [WineController::class, 'create'])->name('wine.create');
    Route::post('/wine-create', [WineController::class, 'store'])->name('wine.store');
    Route::get('/wine-edit/{wine}', [WineController::class, 'edit'])->name('wine.edit');;
    Route::put('/wine-edit/{wine}', [WineController::class, 'update'])->name('wine.update');
    Route::delete('/wine-delete/{wine}', [WineController::class, 'destroy'])->name('wine.delete');

    //Cellar
    //----------------------------------------------------
    Route::get('/cellars', [CellarController::class, 'index'])->name('cellar.index');
    Route::get('/cellar/{cellar}', [CellarController::class, 'show'])->name('cellar.show');
    Route::get('/cellar-create', [CellarController::class, 'create'])->name('cellar.create');
    Route::post('/cellar-create', [CellarController::class, 'store'])->name('cellar.store');
    Route::get('/cellar-edit/{cellar}', [CellarController::class, 'edit'])->name('cellar.edit');
    Route::put('/cellar-edit/{cellar}', [CellarController::class, 'update'])->name('cellar.update');
    Route::delete('/cellar/{cellar}', [CellarController::class, 'destroy'])->name('cellar.delete');

    // CellarHasWine
    //----------------------------------------------------
    Route::get('/collection', [CellarHasWineController::class, 'collection'])->name('collection');
    Route::get('/cellarwine-create/{wine}', [CellarHasWineController::class, 'create'])->name('cellar-wine.create');
    Route::get('/cellarwine/{cellar}', [CellarHasWineController::class, 'index'])->name('cellarwine.index');
    Route::delete('/cellarwine-delete/{cellar}/{wine}', [CellarHasWineController::class, 'destroy'])->name('cellarwine.delete');
    Route::post('/cellarwine-store', [CellarHasWineController::class, 'store'])->name('cellarwine.store');

    // Buy List
    Route::get('/buy-list', [BuyListController::class, 'index'])->name('buylist.index');
    Route::get('/buy-list-create/{wine}', [BuyListController::class, 'create'])->name('buylist.create');
    Route::post('/buy-list', [BuyListController::class, 'store'])->name('buylist.store');
    Route::delete('/buy-list/{wine}', [BuyListController::class, 'destroy'])->name('buylist.delete');

    // Utilitaires
    //-------------- Add & Remove One --------------------
    //->cellar
    Route::get('cellarwine-add/{cellar}/{wine}', [CellarHasWineController::class, 'addOne'])->name('cellarwine.add');
    Route::get('/cellarwine-remove/{cellar}/{wine}', [CellarHasWineController::class, 'removeOne'])->name('cellarwine.remove');
    //->buy-list
    Route::get('buy-list-add/{wine}', [BuyListController::class, 'addOne'])->name('buylist.add');
    Route::get('/buy-list-remove/{wine}', [BuyListController::class, 'removeOne'])->name('buylist.remove');
    //-------------- Search ------------------------------
    Route::get('/search-auto', [CellarController::class, 'searchAuto'])->name('cellar.searchauto');
});

// Page d'erreur
// ----------------------------------------------------
Route::get('/error', function () {
    return Inertia::render('ErrorView');
})->name('error.page');

Route::get('/test', [WineProvider::class, 'updateWineTable']);

require __DIR__.'/auth.php';

// Langue
// ----------------------------------------------------
Route::get('/lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    App::setLocale($locale);
    redirect()->back();
})->name('lang');