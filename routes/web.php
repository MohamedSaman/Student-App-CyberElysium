<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome1');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::get('/create', [StudentController::class, 'create'])->name('Student.create');
Route::post('/store', [StudentController::class, 'store'])->name('Student.store');
Route::get('/{Student}/show', [StudentController::class, 'show'])->name('Student.show');
Route::get('/{Student}/edit', [StudentController::class, 'edit'])->name('Student.edit');
Route::put('/{Student}', [StudentController::class, 'update'])->name('Student.update');
Route::delete('/{Student}', [StudentController::class, 'destroy'])->name('Student.destroy');

require __DIR__.'/auth.php';
