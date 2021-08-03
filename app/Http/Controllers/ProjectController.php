<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    public function store(){
        $attr = request()->validate([
            'user_id'=>'required',
            'name'=>'required|max:255|min:6',
            'slug'=>'required'
        ]);
        Project::create($attr);
        return view('projects.list');
    }

    public function list(){
        return view('projects.list');
    }
    //
    public function show($project){
        return "aktuellles Projekt ist " . $project;
    }
}
