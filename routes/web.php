<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/dashboard', function () {
    $tasks = Auth::user()->tasks()->paginate(5);
    return view('dashboard', compact('tasks'));
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});


require __DIR__.'/auth.php';
