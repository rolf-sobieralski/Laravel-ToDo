<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers;
use App\Http\Controllers\RegisterController;

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
Route::get('/todo/{slug}', function ($slug) {
    return view('viewitem',['todo', $slug]);
});
Route::get('/addItem', function () {
    return view('createitem');
});
Route::get('/projects', function () {
    return view('projects');
});
Route::get('/todos/{slug}', function ($slug) {
    return view('todos', ['project', $slug]);
});
Route::get('/register',[RegisterController::class, 'create']);
Route::post('/register',[RegisterController::class, 'store']);
