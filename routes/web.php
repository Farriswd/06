<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin.index');

    Route::get('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings.index');
    Route::patch('/settings/update', [\App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('admin.settings.update');

    Route::group(['prefix' => 'servers'], function (){
        Route::get('/', [\App\Http\Controllers\Admin\ServerController::class, 'index'])->name('admin.servers.index');
        Route::get('/create', [\App\Http\Controllers\Admin\ServerController::class, 'create'])->name('admin.servers.create');
        Route::post('/', [\App\Http\Controllers\Admin\ServerController::class, 'store'])->name('admin.servers.store');
        Route::get('/edit/{server}', [\App\Http\Controllers\Admin\ServerController::class, 'edit'])->name('admin.servers.edit');
        Route::patch('/update/{server}', [\App\Http\Controllers\Admin\ServerController::class, 'update'])->name('admin.servers.update');
        Route::delete('/delete/{server}', [\App\Http\Controllers\Admin\ServerController::class, 'delete'])->name('admin.servers.delete');
    });

    Route::group(['prefix' => 'news'], function (){
        Route::get('/', [\App\Http\Controllers\Admin\News\NewsController::class, 'index'])->name('admin.news.index');
        Route::get('/create', [\App\Http\Controllers\Admin\News\NewsController::class, 'create'])->name('admin.news.create');
        Route::post('/', [\App\Http\Controllers\Admin\News\NewsController::class, 'store'])->name('admin.news.store');
        Route::get('/edit/{new}', [\App\Http\Controllers\Admin\News\NewsController::class, 'edit'])->name('admin.news.edit');
        Route::patch('/update/{new}', [\App\Http\Controllers\Admin\News\NewsController::class, 'update'])->name('admin.news.update');
        Route::delete('/delete/{new}', [\App\Http\Controllers\Admin\News\NewsController::class, 'delete'])->name('admin.news.delete');

        Route::group(['prefix' => 'categories'], function (){
            Route::get('/', [\App\Http\Controllers\Admin\News\CategoryController::class, 'index'])->name('admin.news.categories.index');
            Route::get('/create', [\App\Http\Controllers\Admin\News\CategoryController::class, 'create'])->name('admin.news.categories.create');
            Route::post('/', [\App\Http\Controllers\Admin\News\CategoryController::class, 'store'])->name('admin.news.categories.store');
            Route::get('/edit/{category}', [\App\Http\Controllers\Admin\News\CategoryController::class, 'edit'])->name('admin.news.categories.edit');
            Route::patch('/update/{category}', [\App\Http\Controllers\Admin\News\CategoryController::class, 'update'])->name('admin.news.categories.update');
            Route::delete('/delete/{category}', [\App\Http\Controllers\Admin\News\CategoryController::class, 'delete'])->name('admin.news.categories.delete');
        });
    });

    Route::group(['prefix' => 'accounts'], function (){
        Route::get('/', [\App\Http\Controllers\Admin\AccountController::class, 'index'])->name('admin.accounts.index');
        Route::get('/create', [\App\Http\Controllers\Admin\AccountController::class, 'create'])->name('admin.accounts.create');
        Route::post('/', [\App\Http\Controllers\Admin\AccountController::class, 'store'])->name('admin.accounts.store');
        Route::get('/edit/{account}', [\App\Http\Controllers\Admin\AccountController::class, 'edit'])->name('admin.accounts.edit');
        Route::patch('/update/{account}', [\App\Http\Controllers\Admin\AccountController::class, 'update'])->name('admin.accounts.update');
        Route::delete('/delete/{account}', [\App\Http\Controllers\Admin\AccountController::class, 'delete'])->name('admin.accounts.delete');
    });
});

require __DIR__.'/auth.php';
