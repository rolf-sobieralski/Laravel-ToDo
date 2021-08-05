@extends('layout')
@section('content')
    <form method="POST" action="/register">
        @csrf
        <div>
        <input type="text" name="name" placeholder="Dein Name" value="{{old('name')}}"></input>
        @error('name')
            <p class="errorp"> Fehler dein Name entspricht nicht den Anforderungen<br>{{$message}}</p>
        @enderror
        </div><div>
        <input type="text" name="email" placeholder="E-Mail Adresse" value="{{old('email')}}"></input>
        @error('email')
            <p class="errorp">Fehler deine E-Mail Adresse entspricht nicht den Anfroderungen<br>{{$message}}</p>
        @enderror
        </div><div>
        <input type="password" name="password" placeholder="Passwort"></input>
        @error('password')
            <p class="errorp">Fehler dein Passwort entspricht nicht den Anforderungen<br>{{$message}}</p>
        @enderror
        </div><div>
        <input type="submit" value="Senden"></input>
        </div>
    </form>
@endsection
