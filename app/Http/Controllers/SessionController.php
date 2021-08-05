<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
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
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','du hast dich erfolgreich abgemeldet');
    }
}
