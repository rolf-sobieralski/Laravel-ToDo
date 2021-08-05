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
@section('projectelements')
    @foreach ($projects as $project)
        <div class="projectlist">
        <a href="/projects/{!! $project->slug !!}/todos">{!! $project->name !!}</a>
        </div>
    @endforeach
@endsection
