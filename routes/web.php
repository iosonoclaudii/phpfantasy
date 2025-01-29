<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CreatureController;

Route::get('/creature', [CreatureController::class, 'index'])->name('creature.index');
Route::post('/creature/feed', [CreatureController::class, 'feed'])->name('creature.feed');
Route::post('/creature/play', [CreatureController::class, 'play'])->name('creature.play');
Route::post('/creature/sleep', [CreatureController::class, 'sleep'])->name('creature.sleep');
Route::post('/creature/status', [CreatureController::class, 'updateStatus'])->name('creature.status');
Route::post('/creature/reset', [CreatureController::class, 'reset'])->name('creature.reset');




Route::middleware(['auth'])->group(function () {
    Route::get('/game', [GameController::class, 'index'])->name('game.index');
    Route::post('/game/guess', [GameController::class, 'guess'])->name('game.guess');
});



Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
});

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

require __DIR__.'/auth.php';
