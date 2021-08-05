<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login(){
        return view('login');
    }
    public function doLogin(){

    }
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','du hast dich erfolgreich abgemeldet');
    }
}
