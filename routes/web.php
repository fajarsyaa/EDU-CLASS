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

Route::group(['middleware' => ['auth', 'teacher'], 'prefix' => 'classes'], function() {
    Route::get('/', [ClassModelController::class, 'index'])->name('classes.index');
    Route::get('/create', [ClassModelController::class, 'create'])->name('classes.create');
    Route::post('/', [ClassModelController::class, 'store'])->name('classes.store');
    Route::get('/{class}/edit', [ClassModelController::class, 'edit'])->name('classes.edit');
    Route::put('/{class}', [ClassModelController::class, 'update'])->name('classes.update');
    Route::delete('/{class}', [ClassModelController::class, 'destroy'])->name('classes.destroy');
    Route::get('/{class}', [ClassModelController::class, 'show'])->name('classes.show');
});
Route::resource('/comments', CommentController::class)->middleware('auth');
Route::resource('/user-classes', UserClassController::class)->middleware('auth');

Route::prefix('module')->group(function () {
    Route::get('/', [ModuleController::class, 'index'])->name('module.index');
    Route::get('/create/{class}', [ModuleController::class, 'create'])->name('module.create');
    Route::post('/', [ModuleController::class, 'store'])->name('module.store');
    Route::get('/{id}', [ModuleController::class, 'show'])->name('module.show');
    Route::get('/{id}/edit', [ModuleController::class, 'edit'])->name('module.edit');
    Route::match(['put', 'patch'], '/{id}', [ModuleController::class, 'update'])->name('module.update');
    Route::delete('/{id}', [ModuleController::class, 'destroy'])->name('module.destroy');
});