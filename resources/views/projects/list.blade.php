@extends('layout')
@section('content')
<form method="POST" action="/projects">
    @csrf
    <div>
    <input type="text" name="name" placeholder="Projekt Name"></input>
    </div><div>
    <input type="submit" value="Senden"></input>
    </div>
</form>
    @foreach ($projects as $project)
        <div class="projectlist">
        <a href="/projects/{!! $project->slug !!}/todos">{!! $project->name !!}</a>
        </div>
    @endforeach
@endsection
