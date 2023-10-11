<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Creator\WorkspaceController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes - Creator
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for admin role. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'role:creator'])->group(function () {


    // dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // profile
    Route::controller(ProfileController::class)
        ->group(function () {
            Route::get('/profile', 'edit')->name('profile.edit');
            Route::patch('/profile', 'update')->name('profile.update');
            Route::delete('/profile', 'destroy')->name('profile.destroy');
        });

    // workspaces
    Route::controller(WorkspaceController::class)
        ->group(function () {

            Route::get('/workspaces', 'index')->name('workspaces.index');
            Route::post('/workspaces', 'store')->name('workspaces.store');
            Route::get('/workspaces/create', 'create')->name('workspaces.create');
            Route::get('/workspaces/{workspace}', 'show')->name('workspaces.show');
            Route::patch('/workspaces/{workspace}', 'update')->name('workspaces.update');
            Route::delete('/workspaces/{workspace}', 'destroy')->name('workspaces.destroy');
            Route::get('/workspaces/{workspace}/edit', 'edit')->name('workspaces.edit');
        });

});

