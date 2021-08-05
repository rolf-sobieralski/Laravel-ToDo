@extends('layout')
@section('projectsform')
<div class="FormTableRow">
    <div class="CreateProjectForm">
        <form method="POST" action="/projects">
            @csrf
            <div class="CreateProjectNameContainer">
                <div class="CreateProjectHeadlineContainer">
                    <p class="CreateProjectHeadline">Neues Projekt anlegen</>
                </div>
            <input type="text" name="name" class="projectNameInput" placeholder="Projekt Name"></input>
            </div><div class="CreateProjectSubmitContainer">
            <input type="submit" class="projectSubmitButton" value="Speichern"></input>
            </div>
        </form>
    </div>
</div>
@endsection
@section('todosform')
<div class="FormTableRow">
    <div class="CreateTodoForm">
        <form method="POST" action="/projects/{!! $project->slug !!}/todos">
            @csrf
            <div class="CreateTodoNameContainer">
                <div class="CreateTodoHeadlineContainer">
                    <p class="CreateTodoHeadline">Neues ToDo anlegen</p>
                </div>
            <input type="text" name="name" class="CreateTodoNameInput" placeholder="ToDo Name"></input>
            </div><div class="CreateTodoDescContainer">
            <textarea name="description" class="CreateTodoDescInput" placeholder="Beschreibung"></textarea>
            </div><div class="CreateTodoSubmitContainer">
            <input type="submit" class="CreateTodoSubmitButton" value="Speichern"></input>
            </div>
        </form>
    </div>
</div>
@endsection

@section('projectelements')
    <div class="ProjectsTodoItems">
        @foreach ($projects as $pj)
            <div class="ProjectListName">
                <a href="/projects/{!!$pj->slug!!}/todos">{!!$pj->name!!}</a>
            </div>
        @endforeach
    </div>
@endsection
@section('todoelements')
    <div class="ProjectTodosList">
        <div class="ProjectNameDiv">
            <h1 class="ProjectName">{!!$project->name!!}</h1>
        </div>
    @foreach ($todos as $todo)
        <div class="todolist">
            <div class="todolink">
            <a href="/projects/{!! $project->slug !!}/todo/{!! $todo->slug!!}">{!! $todo->name !!}</a>
            </div>
            @if ($todo->completed == 0)
            <div class="notCompletedContainer">

            </div>
            @else

            <div class="completedTimeContainer">
            <p class="pcompleted">abgeschlossen am {!! $todo->updated_at!!}</p>
            </div>

            @endif
        </div>
    @endforeach
    </div>
@endsection
@section('singletodo')
<div class="itemViewContainer">
    <div class="itemNameContainer">
        <p class="itemNameText">{!!$todoitem->name . " | " . $todoitem->slug!!}</p>
    </div>
    <div class="itemDescriptionContainer">
        {!! $todoitem->description!!}
    </div>
    @if ($todoitem->completed==1)
        <div class="completedTimeContainer">
            <p class="completedText">{!!$todoitem->updated_at!!}</p>
        </div>
    @else
        <form method="POST" style="padding-top: 2vh" action="/projects/{!! $project->slug !!}/todo/{!! $todoitem->slug !!}/complete">
            @csrf
            <input type="submit" class="CreateTodoSubmitButton" value="erledigt"></input>
        </form>
    @endif
    <div class="backContainer">
        <a href="/projects/{!!$project->slug!!}/todos">zurück</a>
    </div>
</div>
@endsection
