<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public static function show($project){
        return "aktuellles Projekt ist " . $project;
    }
}
