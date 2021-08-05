@extends('layout')
@section('content')
<div class="FormTableRow">
    <div class="CreateProjectForm">
        <form method="POST" action="/projects">
            @csrf
            <div>
            <input type="text" name="name" placeholder="Projekt Name"></input>
            </div><div>
            <input type="submit" value="Senden"></input>
            </div>
        </form>
    </div>
    <div class="CreateTodoForm">
        <form method="POST" action="/projects/{!! $project->slug !!}/todos">
            @csrf
            <div>
            <input type="text" name="name" placeholder="todoname Name"></input>
            </div><div>
            <textarea name="description" placeholder="Beschreibung"></textarea>
            </div><div>
            <input type="submit" value="Senden"></input>
            </div>
        </form>
    </div>
</div>
<div class="DisplayItemRow">
    <div class="ProjectsTodoItems">
        <div class="ProjectNameDiv">
            <h1 class="ProjectName">{!!$project->name!!}</h1>
        </div>
        @foreach ($projects as $pj)
            <div class="ProjectListName">
                <a href="/projects/{!!$pj->slug!!}/todos">{!!$pj->name!!}</a>
            </div>
        @endforeach
    </div>
    <div class="ProjectTodosList">
    @foreach ($todos as $todo)
        <div class="todolist">
            <a href="/projects/{!! $project->slug !!}/todo/{!! $todo->slug!!}">{!! $todo->name !!}</a>
            @if ($todo->completed == 0)
                <form method="POST" action="/projects/{!! $project->slug !!}/todo/{!! $todo->slug !!}/complete">
                    @csrf
                    <input type="submit" value="erledigt"></input>

                </form>
            @else
            <div class="completedTimeContainer">
            <p class="pcompleted">abgeschlossen am {!! $todo->updated_at!!}</p>
            </div>
            @endif
        </div>
    @endforeach
    </div>
</div>
@endsection
