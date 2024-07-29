<?php

use App\Http\Controllers\ClassModelController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserClassController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [DashboardController::class, 'index'])->name("index");
Route::resource('/classes',ClassModelController::class);
Route::resource('/comments', CommentController::class);
Route::resource('/user-classes', UserClassController::class);

