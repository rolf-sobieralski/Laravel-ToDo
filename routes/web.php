<?php

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
Route::get('/todo', function () {
    return view('todolist');
});
Route::get('/addItem', function () {
    return view('createitem');
});
Route::get('/projects', function(){
    return view('projects');
});
Route::get('/todos/{slug}',function($slug){
    return view('todos', ['project', $slug]);
});
