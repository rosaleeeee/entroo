<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/level1', function () {
    return view('level1.level1_obj');
})->name('level1');

Route::get('/level2', function () {
    return view('level2.level2_obj');
})->name('level2');

Route::get('/level3', function () {
    return view('level3.level3_obj');
})->name('level3');

Route::get('/level4', function () {
    return view('level4.level4_obj');
})->name('level4');

require __DIR__.'/auth.php';
