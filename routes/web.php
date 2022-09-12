<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\ProjectAssignmentController;

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

Route::get('/projects', [ProjectController::class,'index']
)->middleware(['auth'])->name('projects');
Route::get('/projects/create', [ProjectController::class,'create']
)->middleware(['can:admin'])->name('createProject');
Route::get('/projects/{project}', [ProjectController::class,'show']
)->middleware(['auth'])->name('showProject');
Route::post('/projects', [ProjectController::class,'store']
)->middleware(['can:admin'])->name('storeProject');
Route::get('/projects/{project}/edit', [ProjectController::class,'edit']
)->middleware(['can:admin'])->name('editProject');
Route::patch('/projects/{project}', [ProjectController::class,'update']
)->middleware(['can:admin'])->name('updateProject');
Route::delete('/projects/{project}', [ProjectController::class,'destroy']
)->middleware(['can:admin'])->name('deleteProject');
Route::post('/projects/{project}/project-assignment-create', [ProjectAssignmentController::class,'store']
)->middleware(['can:adminORmanager'])->name('createProjectAssignment');
Route::delete('/{user}/delete', [ProjectAssignmentController::class,'destroy']
)->middleware(['can:adminORmanager'])->name('deleteProjectAssignment');

Route::get('/admin',[UserController::class,'index'])->middleware(['can:admin'])->name('admin');
Route::patch('/admin/{user}',[UserController::class,'update'])->middleware(['can:admin'])->name('updateUser');
Route::delete('/admin/{user}',[UserController::class,'destroy'])->middleware(['can:admin'])->name('deleteUser');


Route::get('/projects/{project}/task/create', [TaskController::class,'create']
)->middleware(['can:adminORmanager'])->name('createTask');
Route::get('/projects/{project}/{task}', [TaskController::class,'show']
)->middleware(['auth'])->name('showTask');
Route::post('/projects/{project}/tasks', [TaskController::class,'store']
)->middleware(['can:adminORmanager'])->name('storeTask');
Route::get('/projects/{project}/{task}/edit', [TaskController::class,'edit']
)->middleware(['can:adminORmanager'])->name('editTask');
Route::patch('/projects/{project}/{task}', [TaskController::class,'update']
)->middleware(['can:adminORmanager'])->name('updateTask');
Route::delete('/projects/{project}/{task}', [TaskController::class,'destroy']
)->middleware(['can:adminORmanager'])->name('deleteTask');
Route::post('{task}/comments',[CommentController::class,'store'])->middleware(['auth'])->name('createComment');
Route::delete('{comment}/comments',[CommentController::class,'destroy'])->middleware(['auth'])->name('deleteComment');


require __DIR__.'/auth.php';
