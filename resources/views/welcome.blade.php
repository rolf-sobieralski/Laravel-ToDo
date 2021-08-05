@extends('layout')
@section('content')
@if (!auth()->check())
<div class="LoginContainer">
    <div class="LoginInputContainer">
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
@endif
@endsection
