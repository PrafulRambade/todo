<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("login",[UserController::class,'index']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('index',[TodoController::class,'alltodos']);
    Route::post('store',[TodoController::class,'store']);
    Route::get('edit-todo/{id}',[TodoController::class,'edit']);
    Route::put('update',[TodoController::class,'update']);
    Route::delete('delete-todo/{id}',[TodoController::class,'destroy']);
    Route::get('complete/{id}',[TodoController::class,'completed_todo']);
    Route::get('pending',[TodoController::class,'todo_pending']);
    Route::get('completed',[TodoController::class,'todo_completed']);
});