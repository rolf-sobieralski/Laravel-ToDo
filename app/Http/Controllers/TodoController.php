<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class TodoController extends Controller
{
    public function show($slug){

    }

    public function list(){
        return view('todos.list');
    }

    public function store(){
        $attr = request()->validate([
            'project_id'=>'required',
            'name'=>'required|max:255|min:6',
            'slug'=>'required',
            'description'=>'required',
            'completed'=>'required|max:1'
        ]);
        Todo::create($attr);
        return view('todos.list');
    }
}
