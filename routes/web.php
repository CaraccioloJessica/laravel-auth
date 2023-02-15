<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// home
Route::get('/', [MainController::class, 'home'])->name('home');
// show (not private)
Route::get('project/show/{project}', [MainController::class, 'show'])
  ->name('project.show');

// private (admin)
Route::middleware(['auth', 'verified'])
  ->name('private.')
  ->prefix('private')
  ->group(function () {

    Route::get('/', [MainController::class, 'private'])->name('private');

    // create
    Route::get('/project/create', [MainController::class, 'create'])
      ->name('project.create');

    //store 
    Route::post('/project/create', [MainController::class, 'store'])
      ->name('project.store');

    // edit
    Route::get('/project/edit/{project}', [MainController::class, 'edit'])
      ->name('project.edit');

    // update
    Route::post('/project/edit/{project}', [MainController::class, 'update'])
      ->name('project.update');

    // delete
    Route::get('/project/delete/{project}', [MainController::class, 'delete'])
      ->name('project.delete');
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