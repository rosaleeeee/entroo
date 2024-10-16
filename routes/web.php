<?php

use App\Http\Controllers\{
    ProfileController, MbtiQuizController, MBTIPDFController, AllMbtiController,
    AffectMbtiController, MessageController, RecController, IdeaController,
    BusinessModelController, GameController, RankingController, AdminRankingController,
    ScoreController
};
use Illuminate\Support\Facades\Route;
use App\Models\User;

require __DIR__ . '/auth.php';

// General Routes
Route::get('/', fn() => view('welcome'));
Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

// Level 1 Routes
Route::prefix('level1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/start-level1', function () {
        return view('level1.start-level1');
    })->name('start-level1');

    Route::get('/', function () {
        return view('level1.level1_obj');
    })->name('level1');

    Route::get('/buss_', function () {
        return view('level1.BUSINESSMODEL');
    })->name('level1ns');

    Route::get('/FinExercice', function () {
        return view('level1.FinExercice');
    })->name('FinExercice');

    Route::get('/StartExercice', function () {
        return view('level1.StartExercice');
    })->name('StartExercice');

    Route::get('/ExerciceBUSINESSMODEL', function () {
        return view('level1.ExerciceBUSINESSMODEL');
    })->name('ExerciceBUSINESSMODEL');

    Route::get('/FinLevel', function () {
        return view('level1.FinLevel');
    })->name('FinLevel');
});

// Level 2 Routes
Route::get('/level2/start-level2', fn() => view('level2.start-level2'))->middleware(['auth', 'verified'])->name('start-level2');
Route::get('/level2', fn() => view('level2.level2_obj'))->name('level2');
Route::get('/level2/submit-idea', [IdeaController::class, 'showForm'])->middleware(['auth', 'verified'])->name('submit-idea');

// Level 3 Routes
Route::get('/level3/start-level3', fn() => view('level3.start-level3'))->middleware(['auth', 'verified'])->name('start-level3');
Route::get('/level3', fn() => view('level3.level3_obj'))->name('level3');
Route::get('/level3/card', fn() => view('level3.card'))->middleware(['auth', 'verified'])->name('card');
Route::get('/level3/howtoplay', fn() => view('level3.howtoplay'))->middleware(['auth', 'verified'])->name('howtoplay');
Route::get('/level3/quiz', fn() => view('level3.quiz'))->middleware(['auth', 'verified'])->name('quiz');
Route::get('/level3/modellev3', fn() => view('level3.modellev3'))->name('level1ns');

// Level 4 Routes
Route::get('/level4/start-level4', fn() => view('level4.start-level4'))->middleware(['auth', 'verified'])->name('start-level4');
Route::get('/level4', fn() => view('level4.level4_obj'))->name('level4');
Route::get('/level4/quiz/show', [MbtiQuizController::class, 'show'])->name('quiz.show');
Route::post('/level4/quiz/show', [MbtiQuizController::class, 'submit'])->name('quiz.submit');
Route::get('/level4/result', [MbtiQuizController::class, 'result'])->name('quiz.result');

// MBTI and Quiz Routes
Route::get('/mbti-pdf/{id}', [MBTIPDFController::class, 'generatePDF']);
Route::get('/all-mbti', [AllMbtiController::class, 'index'])->name('allMbti');
Route::get('/affect_mbti', [AffectMbtiController::class, 'index'])->middleware(['auth', 'verified'])->name('affect_mbti');
Route::post('/update-temporary-jobs', [AffectMbtiController::class, 'updateTemporaryJobs'])->name('updateTemporaryJobs');
Route::post('/update-jobs', [AffectMbtiController::class, 'updateJobs']);
Route::post('/finalize-jobs', [AffectMbtiController::class, 'finalizeJobs']);
Route::get('/check-all-users-completed', [AffectMbtiController::class, 'checkAllUsersCompleted']);

// Business Model Routes
Route::middleware('auth')->group(function () {
    Route::get('/business-model/create', [BusinessModelController::class, 'create'])->name('business_model.create');
    Route::post('/business-model/store', [BusinessModelController::class, 'store'])->name('business_model.store');
    Route::get('/business-model/wait', [BusinessModelController::class, 'wait'])->name('business_model.wait');
    Route::get('/business-model/result', [BusinessModelController::class, 'result'])->name('business_model.result');
    Route::get('/business-model/check-completion', [BusinessModelController::class, 'checkCompletion'])->name('business_model.checkCompletion');
});

// Idea Routes
Route::post('/ideas', [IdeaController::class, 'store'])->middleware(['auth', 'verified'])->name('ideas.store');
Route::get('/ideas', [IdeaController::class, 'index'])->middleware(['auth', 'verified'])->name('ideas.index');
Route::post('/vote/{id}', [IdeaController::class, 'vote'])->middleware(['auth', 'verified'])->name('ideas.vote');
Route::get('/winning-idea', [IdeaController::class, 'winningIdea'])->middleware(['auth', 'verified'])->name('ideas.winning');
Route::post('/claim-idea-points', [IdeaController::class, 'claimIdeaPoints'])->middleware(['auth', 'verified'])->name('claim-idea-points');

// Messaging Routes
Route::get('/home_mbti', [MessageController::class, 'index'])->middleware(['auth', 'verified'])->name('home_mbti');
Route::get('/messages', [MessageController::class, 'messages'])->middleware(['auth', 'verified'])->name('messages');
Route::post('/message', [MessageController::class, 'message'])->middleware(['auth', 'verified'])->name('message');

// Ranking Routes
Route::get('/ranking', [RankingController::class, 'index'])->name('ranking');
Route::get('/admin-ranking', [AdminRankingController::class, 'index'])->name('admin-ranking');

// Game Routes
Route::post('/check-answers', [GameController::class, 'checkAnswers']);

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Score Routes
Route::post('/save-score', [ScoreController::class, 'saveScore'])->name('save.score');


// Authentication Routes
Auth::routes(['verify' => true]);

require __DIR__ . '/auth.php';
