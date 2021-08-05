@extends('layout')
@section('content')
<div id="Login">
    <form method="post" action="/login">
        @csrf
        <div id="UserName">
            <input type="text" id="UserName" name="user" placeholder="Benutzername"></input>
        </div>
        <div id="Password">
            <input type="password" id="Pass" name="Pass" placeholder="Passwort"></input>
        </div>
        <div id="SendButton">
            <input type="submit" value="Login"></input>
        </div>
    </form>
</div>
@endsection
