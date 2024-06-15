<?php

use App\Http\Controllers\ListsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return Inertia::render('Dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [ListsController::class, 'index'])->name('dashboard'); // какая-то хуита, надо связать дашборд и это недоразумение
    Route::get('/pagename/create', [ListsController::class, 'create'])->name('list.create');
    Route::post('/pagename2', [ListsController::class, 'store'])->name('list.store');
    Route::get('/pagename2/{ListId}', [ListsController::class, 'show'])->name('list.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
