<form method="POST" action="/register">
    @csrf
    <div>
    <input type="text" name="name" placeholder="Dein Name"></input>
    </div><div>
    <input type="text" name="email" placeholder="E-Mail Adresse"></input>
    </div><div>
    <input type="password" name="password" placeholder="Passwort"></input>
    </div><div>
    <input type="submit" value="Senden"></input>
    </div>
</form>
