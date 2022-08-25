<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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
)->middleware(['auth'])->name('createProject');
Route::post('/projects/create', [ProjectController::class,'store']
)->middleware(['auth'])->name('createProject');
Route::get('/projects/{project}/edit', [ProjectController::class,'edit']
)->middleware(['auth'])->name('editProject');

require __DIR__.'/auth.php';
