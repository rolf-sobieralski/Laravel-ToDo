<form method="POST" action="/register">
    @csrf
    <div>
    <input type="text" name="name" placeholder="Dein Name"></input>
    </div><div>
    <input type="text" name="mail" placeholder="E-Mail Adresse"></input>
    </div><div>
    <input type="password" name="pass" placeholder="Passwort"></input>
    </div><div>
    <input type="password" name="passrepeat" placeholder="Wiederholung"></input>
    </div><div>
    <input type="submit" value="Senden"></input>
    </div>
</form>