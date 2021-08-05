@extends('layout')
@section('todosform')
@if (!auth()->check())
<div class="LoginContainer">
    <div class="LoginInputContainer">
        <div class="loginPositionContainer">
            @error('email')
                <p class="errorp">{{$message}}</p>
            @enderror
            <form method="post" action="/login">
                @csrf
                <div class="UserNameDiv">
                    <input type="text" class="UserNameInput" name="email" placeholder="E-Mail Adresse" value="{{old('email')}}"></input>
                </div>
                <div class="PasswordDiv">
                    <input type="password" class="PassInput" name="password" placeholder="Passwort"></input>
                </div>
                <div class="SendButtonDiv">
                    <input type="submit" class="SendButton" value="Login"></input>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
@section('todoelements')
<div class="RegisterLinkContainer">
    <a href="/register">Registrieren</a>
</div>
@endsection
