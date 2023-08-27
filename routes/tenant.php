<?php

declare(strict_types=1);

use App\Http\Controllers\Tenant\Auth\LoginController;
use App\Http\Controllers\Tenant\AutomobileController;
use App\Http\Controllers\Tenant\CustomerController;
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
    Route::name('tenant.')->group(function () {

        Route::resource('automobiles', AutomobileController::class);
        Route::resource('clients', CustomerController::class);
        Route::resource('client-history', CustomerController::class);
        Route::resource('maintainence-history', CustomerController::class);
        Route::resource('insurance-company', CustomerController::class);
        Route::resource('surveyor', CustomerController::class);
        Route::resource('insurance-history', CustomerController::class);
        Route::resource('surveyor-history', CustomerController::class);
        Route::resource('vendor', CustomerController::class);
        Route::resource('inventory', CustomerController::class);
        Route::resource('inventory-history', CustomerController::class);
        Route::resource('manager', CustomerController::class);
        Route::resource('staff-user', CustomerController::class);
        Route::resource('labour', CustomerController::class);
        Route::resource('parts', CustomerController::class);
        Route::resource('labour', CustomerController::class);
        Route::resource('invoice', CustomerController::class);
        Route::resource('taxes', CustomerController::class);




        Route::get('login', [LoginController::class, 'create']);
        Route::post('login', [LoginController::class, 'store'])->name('login');
    });
});
