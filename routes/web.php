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
Route::get('/', [DashboardController::class, 'index'])->name("index");
Route::get('/user-list', [UserController::class, 'userList'])->name('user.list')->middleware('auth');
Route::get('/user-create', [UserController::class, 'userCreate'])->name('user.create')->middleware('auth');
Route::post('/user-create-action', [UserController::class, 'userCreateAction'])->name('user.createaction')->middleware('auth');
Route::get('/user/{user}/edit', [UserController::class, 'userEdit'])->name('user.edit')->middleware('auth');
Route::put('/user/{user}', [UserController::class, 'userUpdate'])->name('user.update')->middleware('auth');
Route::delete('/user/{user}', [UserController::class, 'userDelete'])->name('user.destroy')->middleware('auth');

Route::group(['middleware' => ['auth', 'teacher'], 'prefix' => 'classes'], function() {
    Route::get('/', [ClassModelController::class, 'index'])->name('classes.index');
    Route::get('/create', [ClassModelController::class, 'create'])->name('classes.create');
    Route::post('/', [ClassModelController::class, 'store'])->name('classes.store');
    Route::get('/{class}/edit', [ClassModelController::class, 'edit'])->name('classes.edit');
    Route::put('/{class}', [ClassModelController::class, 'update'])->name('classes.update');
    Route::delete('/{class}', [ClassModelController::class, 'destroy'])->name('classes.destroy');
    Route::get('/{class}', [ClassModelController::class, 'show'])->name('classes.show');
});

Route::resource('/user-classes', UserClassController::class)->middleware('auth');
// Route::resource('/classes',ClassModelController::class);

Route::middleware('auth')->prefix('comments')->group(function () {
    Route::get('/{moduleId}', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/{comment}', [CommentController::class, 'show'])->name('comments.show');
    Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});


Route::prefix('module')->group(function () {
    Route::get('/', [ModuleController::class, 'index'])->name('module.index');
    Route::get('/create/{class}', [ModuleController::class, 'create'])->name('module.create');
    Route::post('/', [ModuleController::class, 'store'])->name('module.store');
    Route::get('/{id}', [ModuleController::class, 'show'])->name('module.show');
    Route::get('/{id}/edit', [ModuleController::class, 'edit'])->name('module.edit');
    Route::patch('/approve/{id}', [ModuleController::class, 'approve'])->name('module.approve');
    Route::match(['put', 'patch'], '/{id}', [ModuleController::class, 'update'])->name('module.update');
    Route::delete('/{id}', [ModuleController::class, 'destroy'])->name('module.destroy');
    
});