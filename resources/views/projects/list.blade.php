<form method="POST" action="/projects">
    @csrf
    <div>
    <input type="text" name="user_id" placeholder="user id"></input>
    </div><div>
    <input type="text" name="name" placeholder="Projekt Name"></input>
    </div><div>
    <input type="text" name="slug" placeholder="Slug"></input>
    </div><div>
    <input type="submit" value="Senden"></input>
    </div>
</form>
