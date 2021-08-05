<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Todo;
use App\Models\Project;
class TodoController extends Controller
{
    public function complete($projectslug,$todoslug){
        $project = Project::firstWhere('user_id',auth()->user()->id)->firstWhere('slug',$projectslug);
        $todo = Todo::firstWhere('project_id', $project->id)->firstWhere('slug',$todoslug);
        $todo->completed = 1;
        $todo->updated_at = date('Y-m-d H:i:s');
        $todo->save();
        return $this->list($projectslug);
    }
    public function show($projectslug,$todoslug){
        $projects = Project::all()->where('user_id',auth()->user()->id);
        $project = Project::firstWhere('user_id',auth()->user()->id)->firstWhere('slug',$projectslug);
        $todos = Todo::all()->where('project_id', $project->id);
        $todo = Todo::all()->where('project_id', $project->id)->firstWhere('slug',$todoslug);
        return view('item',['todoitem'=>$todo,'project_id'=>$project->id, 'project'=>$project,'todos'=>$todos, 'projects'=>$projects,'todoslug'=>$todoslug]);
    }

    public function list($projectslug){
        $projects = Project::all()->where('user_id',auth()->user()->id);
        $project = Project::firstWhere('user_id',auth()->user()->id)->firstWhere('slug',$projectslug);
        $todos = Todo::all()->where('project_id', $project->id);
        return view('todos.list',['project_id'=>$project->id, 'project'=>$project,'todos'=>$todos, 'projects'=>$projects]);
    }

    public function store($projectslug){
        $project = Project::firstWhere('user_id',auth()->user()->id)->firstWhere('slug',$projectslug);
        //ddd($project);
        $attr = request()->validate([
            'name'=>'required|max:255|min:2',
            'description'=>'required',
        ]);
        $attr['project_id'] =$project->id;
        $attr['slug'] = $this->createSlug($attr['name']);;
        $attr['completed'] = 0;
        Todo::create($attr);
        return $this->list($projectslug);
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
        return Todo::select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }
}
