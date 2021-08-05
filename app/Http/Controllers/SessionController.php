<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    /*
    Function doLogin validiert die übergebenen Werte und versucht den aktuellen Benutzer an zu melden.
    wenn es klappt, wird ohne Info zurück geleitet. wenn nicht, wird mit alten Werten und einem
    Fehler für Mail zurück geleitet
    */
    public function doLogin(){
        $attr = request()->validate([
            'email'=>'required|exists:users,email',
            'password'=>'required|max:255|min:8'
        ]);
        if(auth()->attempt($attr)){
            return back();
        }else{
            return back()->withInput()->withErrors(['email'=>'Zugangsdaten falsch']);
        }
    }
    /*
    Function logout meldet den Bentuzer ab und leitet auf den Einstiegspunkt um
    */
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','du hast dich erfolgreich abgemeldet');
    }
}
