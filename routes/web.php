<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/tasks/{project}', [TaskController::class, 'index'])->name('task.index');
    Route::get('/task/show', [TaskController::class, 'show'])->name('task.show');
    Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
    Route::put('/task/update', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/task/delete', [TaskController::class, 'delete'])->name('task.delete');

    Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/edit/{project}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/update/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/delete/{project}', [ProjectController::class, 'delete'])->name('project.delete');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
});