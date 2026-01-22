<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Обновленный маршрут Dashboard — теперь он вызывает метод index
Route::get('/dashboard', [ApplicationController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    // Маршруты для профиля (стандартные)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Маршруты для заявок
    Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');

    // Маршрут для смены статуса (только для админа)
    Route::patch('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])
        ->name('applications.updateStatus');
});

require __DIR__.'/auth.php';
