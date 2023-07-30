<?php

use App\Http\Controllers\Central\MainController;
use App\Http\Controllers\Central\TenantController;
use App\Http\Controllers\Central\Theme\ThemeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    // dd('some');
    return view('welcome');
});

// Route::get('/dashboard', function () {

//     return view('central.admin.dashboard');

// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::post('change-theme', [ThemeController::class, 'change_theme'])->name('central.theme');
    Route::get('create-tenant/{tenant_name}', [MainController::class, 'create_tenant']);

    Route::get('dashboard', [MainController::class, 'index'])->name('dashboard');
    
    Route::resource('tenants', TenantController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
