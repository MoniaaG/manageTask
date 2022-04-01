<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/task/get',[TaskController::class, 'getTasks']);
    Route::get('/task/show', [TaskController::class, 'show'])->name('task.show');
    Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
    Route::get('/task/edit/{task}', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/task/update', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/task/delete', [TaskController::class, 'delete'])->name('task.delete');

    Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/edit/{project}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/update/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/delete/{project}', [ProjectController::class, 'delete'])->name('project.delete');
});