<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassModelController;
use App\Http\Controllers\CommentController;
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


Route::get('/', [DashboardController::class, 'index'])->name("index")->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [UserController::class, 'register_create'])->name('register.create')->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/user-list', [UserController::class, 'userList'])->name('user.list')->middleware('auth');
Route::get('/user-create', [UserController::class, 'userCreate'])->name('user.create')->middleware('auth');
Route::post('/user-create-action', [UserController::class, 'userCreateAction'])->name('user.createaction')->middleware('auth');
Route::get('/user/{user}/edit', [UserController::class, 'userEdit'])->name('user.edit')->middleware('auth');
Route::put('/user/{user}', [UserController::class, 'userUpdate'])->name('user.update')->middleware('auth');
Route::delete('/user/{user}', [UserController::class, 'userDelete'])->name('user.destroy')->middleware('auth');

Route::resource('/classes',ClassModelController::class)->middleware(['auth', 'teacher']);
Route::resource('/comments', CommentController::class)->middleware('auth');
Route::resource('/user-classes', UserClassController::class)->middleware('auth');

Route::resource('module', ModuleController::class);
