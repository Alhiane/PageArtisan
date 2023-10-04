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

Route::middleware(['auth','role:creator'])->group(function () {


    // dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // workspaced
    Route::get('/workspaces', [WorkspaceController::class, 'index'])->name('workspaces.index');

});
