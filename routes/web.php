<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\SessionController;
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
})->middleware('guest');
Route::post('/logout',[SessionController::class,'logout']);
Route::post('/login',[SessionController::class,'doLogin'])->middleware('guest');

Route::get('/projects', [ProjectController::class,'list'])->middleware('auth');
Route::post('/projects',[ProjectController::class,'store'])->middleware('auth');
Route::get('/projects/{pid}/todos',[TodoController::class,'list'])->middleware('auth');
Route::post('/projects/{pid}/todos',[TodoController::class,'store'])->middleware('auth');
Route::get('/projects/{pid}/todo/{tid}', [TodoController::class,'show'])->middleware('auth');
Route::post('/projects/{pid}/todo/{tid}/complete',[TodoController::class,'complete'])->middleware('auth');

Route::get('/register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store'])->middleware('guest');
