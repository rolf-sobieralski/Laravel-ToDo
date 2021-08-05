<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Project;
class ProjectController extends Controller
{
    /*
    Function store wird genutzt um ein neues Projekt zu erstellen.
    übergebene Werte werden validiert, die ID des aktuellen Benutzers sowie ein
    erzeugter Slug wird dem Array hinzugefügt, das neue Projekt gespeichert und die Function
    list aufgerufen
    */
    public function store(){
        $attr = request()->validate([
            'name'=>'required|max:255|min:6',
        ]);
        $attr['user_id'] = auth()->user()->id;
        $attr['slug'] = $this->createSlug($attr['name']);
        Project::create($attr);
        return $this->list();
    }

    /*
    Function list wird genutzt um die Projekte des aktuell angemeldeten Benutzers an zu zeigen
    */
    public function list(){
        $projects = Project::all()->where('user_id',auth()->user()->id);
        return view('projects.list',['projects'=>$projects]);
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
        return Project::select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }
}
