<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// home
Route::get('/', [MainController::class, 'home'])->name('home');
// show (not private)
Route::get('/show/{project}', [MainController::class, 'show'])
  ->name('show');

// private (admin)
Route::middleware(['auth', 'verified'])
  ->name('private.')
  ->prefix('private')
  ->group(function () {

    Route::get('/', [MainController::class, 'private'])->name('private');

    // create
    Route::get('/create', [MainController::class, 'create'])
      ->name('create');

    //store 
    Route::post('/create', [MainController::class, 'store'])
      ->name('store');

    //edit 
    Route::get('/edit/{project}', [MainController::class, 'edit'])
      ->name('edit');

    // update
    Route::post('/edit/{project}', [MainController::class, 'update'])
      ->name('update');

    // delete
    Route::get('/delete/{project}', [MainController::class, 'delete'])
      ->name('delete');
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