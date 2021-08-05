@extends('layout')
@section('todosform')
<div class="RegisterFormContainer">
    <form method="POST" action="/register">
        @csrf
        <div class="RegisterNameInputContainer">
        <input type="text" name="name" class="RegisterNameInput" placeholder="Dein Name" value="{{old('name')}}"></input>
        @error('name')
            <p class="errorp"> Fehler dein Name entspricht nicht den Anforderungen<br>{{$message}}</p>
        @enderror
        </div><div class="RegisterMailInputContainer">
        <input type="text" name="email" class="RegisterMailInput" placeholder="E-Mail Adresse" value="{{old('email')}}"></input>
        @error('email')
            <p class="errorp">Fehler deine E-Mail Adresse entspricht nicht den Anfroderungen<br>{{$message}}</p>
        @enderror
        </div><div class="RegisterPassInputContainer">
        <input type="password" name="password" class="RegisterPassInput" placeholder="Passwort"></input>
        @error('password')
            <p class="errorp">Fehler dein Passwort entspricht nicht den Anforderungen<br>{{$message}}</p>
        @enderror
        </div><div class="RegisterSubmitContainer">
        <input type="submit" class="RegisterSubmitButton" value="Senden"></input>
        </div>
    </form>
</div>
@endsection
