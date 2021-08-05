<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    /*
    Function create gibt einfach den Blade zum anlegen eines neuen Benutzers aus
    */
    public function create(){
        return view('register.create');
    }
    /*
    Function store prüft die übergebenen Daten, verschlüsselt das Kennwort und
    speichert den neuen Benutzer in der Datenbank. anschließend wird
    der erstellte benutzer angemeldet und ein Redirect auf den
    Einstiegspunkt durchgeführt
    */
    public function store(){
        $attr = request()->validate([
            'name'=>'required|max:255|min:6',
            'email'=>'required|email|max:255|min:6',
            'password'=>'required|max:255|min:8'
        ]);
        $attr['password'] = bcrypt($attr['password']);
        $user = User::create($attr);
        auth()->login($user);
        return redirect('/')->with('success','Benutzerkonto wurde erfolgreich angelegt');

    }
}
