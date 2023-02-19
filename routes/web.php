<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Notification;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    $tasks = Task::latest()->paginate(10);
    $notifications = Notification::where('to_id', Auth::user()->id)->latest()->paginate(10);
    // dd($notifications);
    return view('dashboard', compact('tasks', 'notifications'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//user route
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware(['auth', 'role:admin']);
Route::post('/user', [UserController::class, 'store'])->name('user.store')->middleware(['auth', 'role:admin']);
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware(['auth', 'role:admin']);
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update')->middleware(['auth', 'role:admin']);
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware(['auth', 'role:admin']);

// task route
Route::post('/task', [TaskController::class, 'store'])->name('task.store')->middleware(['auth', 'role:employee']);
Route::post('/task', [TaskController::class, 'approve'])->name('task.approve')->middleware(['auth']);
Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy')->middleware(['auth', 'role:admin']);

// forms
Route::get('/forms/user-form', function() {})->name('forms.user-form');
Route::get('/forms/task-form', function() {})->name('forms.task-form');
Route::get('/forms/detail-task', function() {})->name('forms.detail-task');
Route::get('/forms/approvement-form', function() {})->name('forms.approvement-form');
require __DIR__.'/auth.php';
