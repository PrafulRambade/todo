<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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
    return view('todo_view');
});

Route::get('index',[TodoController::class,'index'])->name('ajaxtodos.index');
Route::get('pending',[TodoController::class,'pending'])->name('ajaxtodos.pending');
Route::get('completed',[TodoController::class,'completed'])->name('ajaxtodos.completed');
Route::post('store',[TodoController::class,'store'])->name('ajaxtodos.store');
Route::get('edit-todo/{id}',[TodoController::class,'edit']);
Route::delete('delete-todo/{id}',[TodoController::class,'destroy']);
Route::get('complete/{id}',[TodoController::class,'completed_todo']);
Route::put('update',[TodoController::class,'update'])->name('ajaxtodos.update');
