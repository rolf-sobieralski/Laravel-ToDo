<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class TodoController extends Controller
{
    public function show($project,$todo){

    }

    public function list($project){
        return view('todos.list');
    }

    public function store($project){
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
