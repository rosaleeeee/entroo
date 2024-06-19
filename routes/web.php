<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MbtiQuizController;
use App\Http\Controllers\MBTIPDFController;
use App\Http\Controllers\AllMbtiController;
use App\Http\Controllers\AffectMbtiController;


use App\Models\User;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/level1/start-level1', function () {
    return view('level1.start-level1');
})->middleware(['auth', 'verified'])->name('start-level1');

Route::get('/level2/start-level2', function () {
    return view('level2.start-level2');
})->middleware(['auth', 'verified'])->name('start-level2');

Route::get('/level3/start-level3', function () {
    return view('level3.start-level3');
})->middleware(['auth', 'verified'])->name('start-level3');

Route::get('/level4/start-level4', function () {
    return view('level4.start-level4');
})->middleware(['auth', 'verified'])->name('start-level4');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Auth::routes([
    'verify' => true
]);

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


Route::get('/level3/card', function () {
    return view('level3.card');
})->middleware(['auth', 'verified'])->name('card');

Route::get('/level4/quiz/show', [MbtiQuizController::class, 'show'])->name('quiz.show');
Route::post('/level4/quiz/show', [MbtiQuizController::class, 'submit'])->name('quiz.submit');
Route::get('/level4/result', [MbtiQuizController::class, 'result'])->name('quiz.result');
Route::get('/level4/quiz/result', [App\Http\Controllers\MbtiQuizController::class, 'result'])->name('quiz.result');

Route::get('/mbti-pdf/{id}', [MBTIPDFController::class, 'generatePDF']);

Route::get('/all-mbti', [AllMbtiController::class, 'index'])->name('allMbti');

Route::get('/affect_mbti', [AffectMbtiController::class, 'index'])->middleware(['auth', 'verified'])
->name('affect_mbti');

Route::post('/update-jobs', [AffectMbtiController::class, 'updateJobs']);
Route::post('/update-temporary-jobs', [AffectMbtiController::class, 'updateTemporaryJobs']);
Route::post('/finalize-jobs', [AffectMbtiController::class, 'finalizeJobs']);
Route::get('/check-all-users-completed', [AffectMbtiController::class, 'checkAllUsersCompleted']);



require __DIR__.'/auth.php';
