<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Todo;
use App\Models\Project;
class TodoController extends Controller
{
    /*
    Function complete wird genutzt, um ein Todo ab zu schließen.
    erst wird das projekt geholt, um mit der ID das zu schließende ToDo zu erhalten.
    dann wird completed auf true gesetzt, das aktuelle Datum unter updated_at eingetragen,
    das ToDo gespeichert und die Function list aufgerufen
    */
    public function complete($projectslug,$todoslug){
        $project = Project::firstWhere('user_id',auth()->user()->id)->firstWhere('slug',$projectslug);
        $todo = Todo::firstWhere('project_id', $project->id)->firstWhere('slug',$todoslug);
        $todo->completed = 1;
        $todo->updated_at = date('Y-m-d H:i:s');
        $todo->save();
        return $this->list($projectslug);
    }
    /*
    Function show zeigt das ausgewählte ToDo mit der Beschreibung an.
    um ein gleichmäßiges Bild im Browser zu bekommen, wird die Liste der Projekte,das aktuelle Projekt,
    die Liste der projekt zugehörigen ToDo's und das aktuelle ToDo geholt und an die View übergeben
    */
    public function show($projectslug,$todoslug){
        $projects = Project::all()->where('user_id',auth()->user()->id);
        $project = Project::firstWhere('user_id',auth()->user()->id)->firstWhere('slug',$projectslug);
        $todos = Todo::all()->where('project_id', $project->id);
        $todo = Todo::all()->where('project_id', $project->id)->firstWhere('slug',$todoslug);
        return view('item',['todoitem'=>$todo,'project_id'=>$project->id, 'project'=>$project,'todos'=>$todos, 'projects'=>$projects,'todoslug'=>$todoslug]);
    }
    /*
    Function list zeigt die Liste der zum projekt zugehörigen ToDo's.
    auch hier wird, um ein gleichmäßiges Bild im Browser zu bekommen, eine Liste der Projekte des Benutzers
    ,das aktuelle Projekt und die Liste der zum projekt gehörenden ToDo's  geholt und an die View übergeben
    */
    public function list($projectslug){
        $projects = Project::all()->where('user_id',auth()->user()->id);
        $project = Project::firstWhere('user_id',auth()->user()->id)->firstWhere('slug',$projectslug);
        $todos = Todo::all()->where('project_id', $project->id);
        return view('todos.list',['project_id'=>$project->id, 'project'=>$project,'todos'=>$todos, 'projects'=>$projects]);
    }

    /*
    Function store speichert ein neues ToDo. erst wird anhand des Slug das aktuelle Projekt geholt,
    die übergebene Daten validiert, die Projekt Id sowie ein neuer Slug an das Array angehängt,
    completed mit dem wert 0 hinzugefügt und das neue ToDo gespeichert. abschließend, wird die Function
    list aufgerufen
    */
    public function store($projectslug){
        $project = Project::firstWhere('user_id',auth()->user()->id)->firstWhere('slug',$projectslug);
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
    /*
    Function createSlug brauchen wir um für jedes Projekt einen einzigartigen Slug zu bekommen.
    mit der Helper function slug wird ein Slug erzeugt, mit einer ID an getRelatedSlugs übergeben
    und im ergebnis nach dem slug gesucht. falls er nicht vorhanden ist, wird der Slug zurück
    gegeben. wenn doch, wird wird dem slug eine Zahl angehängt und eine Schleife so lange
    durchlaufen, bis ein slug gefunden wurde der nicht in der Liste auftaucht.
    */
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
    /*
    Function getRelatedSlugs wird genutzt, um eine Slug Liste der vorhandenen Objekte zu bekommen
    */
    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Todo::select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }
}
