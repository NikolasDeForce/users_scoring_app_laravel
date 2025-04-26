<?php

use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UsersController::class, "index"])->name('users.index');
Route::get('/users/create', [UsersController::class, "create"])->name('users.create');
Route::post('/users', [UsersController::class, "store"])->name('users.store');
Route::get('users/{user}', [UsersController::class, "show"])->name('users.show');
Route::get('users/{user}/edit', [UsersController::class, "edit"])->name('users.edit');
Route::patch('users/{user}', [UsersController::class, "update"])->name('users.update');
Route::delete('users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::get('/signin', [SignInController::class, "index"])->name('signin.index');
