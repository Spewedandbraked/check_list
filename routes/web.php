<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\admin;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware(admin::class)->prefix('admin')->group(function (){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ListsController::class, 'index'])->name('dashboard');
    Route::get('/pagename/create', [ListsController::class, 'create'])->name('list.create');
    Route::post('/pagename/create', [ListsController::class, 'store'])->name('list.store');
    Route::get('/pagename2/{ListId}', [ListsController::class, 'show'])->name('list.show');
    Route::delete('/pagename2/{ListId}', [ListsController::class, 'destroy'])->name('list.delete');

    Route::get('pdf/{ListId}', [PDFController::class, 'index'])->name('pdf');
    // Route::get('pdf2/{ListId}', [PDFController::class, 'index2'])->name('pdf2');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
