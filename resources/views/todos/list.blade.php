<form method="POST" action="/todos">
    @csrf
    <div>
    <input type="text" name="project_id" placeholder="project id"></input>
    </div><div>
    <input type="text" name="name" placeholder="todoname Name"></input>
    </div><div>
    <input type="text" name="slug" placeholder="Slug"></input>
    </div><div>
    <textarea name="description" placeholder="Beschreibung"></textarea>
    </div><div>
    <input type="text" name="completed" placeholder="abgeschlossen"></input>
    </div><div>
    <input type="submit" value="Senden"></input>
    </div>
</form>
