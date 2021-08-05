<div class="itemViewContainer">
    <div class="itemNameContainer">
        <p class="itemNameText">{!!$todo->name!!}
    </div>
    <div class="itemDescriptionContainer">
        {!! $todo->description!!}
    </div>
    @if ($todo->completed==1)
        <div class="completedTimeContainer">
            <p class="completedText">{!!$todo->updated_at!!}</p>
        </div>
        <div class="backContainer">
            <a href="/projects/{!!$project!!}/todos">zurück</a>
        </div>
    @else
        <form method="POST" action="/projects/{!! $project !!}/todo/{!! $todo->slug !!}/complete">
            @csrf
            <input type="submit" value="erledigt"></input>
        </form>
    @endif
</div>
