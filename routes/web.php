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
});

require __DIR__.'/auth.php';
