<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'homepage']);
Route::get('movie/{id}/{slug}', [MovieController::class, 'detailmovie']);

Route::get('create-movie', [MovieController::class, 'create'])->name('createMovie')->middleware('auth');
Route::post('/movie', [MovieController::class, 'store'])->name('storeMovie');

Route::get('/login', [AuthController::class, 'loginform'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])-> name('logout');

<<<<<<< HEAD
Route::get('/data-movie', [MovieController::class, 'datamovie']) ->middleware('auth');
=======
Route::get('/data-movie', [MovieController::class, 'datamovie']) ->middleware('auth')->name('datamovie');
>>>>>>> 15d273c5217098154ffdbdfc0b0e50b286769aa3

Route::get('/editmovie/{id}', [MovieController::class, 'edit']) ->middleware('auth', RoleAdmin::class);
Route::get('/hapusmovie/{id}', [MovieController::class, 'hapus']) ->middleware('auth');
