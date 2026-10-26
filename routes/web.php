<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// Livewire
use App\Livewire\RegistroAsistencia;
use App\Livewire\Estadisticas;

Route::get('/', RegistroAsistencia::class)->name('registro');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/estadisticas', Estadisticas::class)->name('estadisticas');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
