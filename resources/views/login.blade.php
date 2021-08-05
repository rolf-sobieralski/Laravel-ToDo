@extends('layout')
@section('content')
<div id="Login">
            @error('email')
                <p class="errorp">{{$message}}</p>
            @enderror
    <form method="post" action="/login">
        @csrf
        <div id="UserName">
            <input type="text" id="UserName" name="email" placeholder="E-Mail Adresse" value="{{old('email')}}"></input>
        </div>
        <div id="Password">
            <input type="password" id="Pass" name="password" placeholder="Passwort"></input>
        </div>
        <div id="SendButton">
            <input type="submit" value="Login"></input>
        </div>
    </form>
</div>
@endsection
