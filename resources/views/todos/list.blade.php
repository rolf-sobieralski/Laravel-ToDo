<form method="POST" action="/projects/{!! $project !!}/todos">
    @csrf
    <div>
    <input type="text" name="name" placeholder="todoname Name"></input>
    </div><div>
    <textarea name="description" placeholder="Beschreibung"></textarea>
    </div><div>
    <input type="submit" value="Senden"></input>
    </div>
</form>
    @foreach ($todos as $todo)
        <div class="todolist">
            <a href="/projects/{!! $project !!}/todo/{!! $todo->slug!!}">{!! $todo->name !!}</a>
            @if ($todo->completed == 0)
                <form method="POST" action="/projects/{!! $project !!}/todo/{!! $todo->slug!!}/complete">
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
