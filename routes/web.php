<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// home
Route::get('/', [MainController::class, 'home'])->name('home');
// show (not private)
Route::get('/project/show/{project}', [MainController::class, 'projectShow'])
  ->name('project.show');

// logged (admin)
Route::middleware(['auth', 'verified'])
  ->name('private.')
  ->prefix('private')
  ->group(function () {

    Route::get('/', [MainController::class, 'private']);

    Route::get('/project/create', [MainController::class, 'projectCreate'])
      ->name('project.create');

    Route::post('/project/create', [MainController::class, 'projectStore'])
      ->name('project.store');
  });

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';