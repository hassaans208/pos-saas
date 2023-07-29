<?php

declare(strict_types=1);

use App\Http\Controllers\Tenant\Auth\LoginController;
use App\Http\Controllers\Tenant\Theme\ThemeController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::post('change-theme', [ThemeController::class, 'change_theme'])->name('change.theme');
    Route::get('/dashboard', function () {
        return view('tenant.admin.dashboard');
    })->name('tenant.dashboard');

    Route::get('/', function () {
        return view('tenant.admin.index');
    });
    Route::get('/create', function () {
        return view('tenant.admin.create');
    });
    Route::name('tenant.')->prefix('tenant')->group(function () {


        Route::get('login', [LoginController::class, 'create']);
        Route::post('login', [LoginController::class,'store'])->name('login');
    });
});
