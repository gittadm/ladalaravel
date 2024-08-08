<?php

use App\Http\Controllers\RegExpController;
use App\Http\Controllers\Task2Controller;
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

Route::get('task1', [TaskController::class, 'task1']);
Route::get('task2', [TaskController::class, 'task2']);
Route::get('task3', [TaskController::class, 'task3']);
Route::get('task4', [TaskController::class, 'task4']);
Route::get('task5', [TaskController::class, 'task5']);

Route::get('lesson2/task1', [Task2Controller::class, 'task1']);
Route::get('lesson2/task3', [Task2Controller::class, 'task3']);
Route::get('lesson2/books', [Task2Controller::class, 'filterBooks'])->name('books');
Route::get('lesson2/books/delete/{id}', [Task2Controller::class, 'deleteBook'])->name('books.delete');

Route::get('lesson3/task-about-surnames', [Task2Controller::class, 'task']);

Route::get('regexp', [RegExpController::class, 'regexp']);
