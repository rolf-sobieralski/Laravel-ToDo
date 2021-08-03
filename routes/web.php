<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProjectController;
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
    return view('welcome');
});

Route::get('/projects', [ProjectController::class,'list']);
Route::post('/projects',[ProjectController::class,'store']);
Route::get('/project/{slug}', [ProjectController::class, 'show']);

Route::get('/todos',[TodoController::class,'list']);
Route::post('/todos',[TodoController::class,'store']);
Route::get('/todo/{slug}', [TodoController::class,'show']);


Route::get('/register',[RegisterController::class, 'create']);
Route::post('/register',[RegisterController::class, 'store']);
