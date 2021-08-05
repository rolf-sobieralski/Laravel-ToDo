<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Project;
class ProjectController extends Controller
{
    public function store(){
        $attr = request()->validate([
            'name'=>'required|max:255|min:6',
        ]);
        $attr['user_id'] = auth()->user()->id;
        $attr['slug'] = $this->createSlug($attr['name']);
        Project::create($attr);
        $this->list();
    }

    public function list(){
        $projects = Project::all()->where('user_id',auth()->user()->id);
        return view('projects.list',['projects'=>$projects]);
    }
    //
    public function show($project){
        return "aktuellles Projekt ist " . $project;
    }
    public function createSlug($title, $id = 0)
    {
        $slug = Str::slug($title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
    }
    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Project::select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }
}
