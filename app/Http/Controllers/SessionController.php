<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionController extends Controller
{
    public function doLogin(){
        $attr = request()->validate([
            'email'=>'required|exists:users,email',
            'password'=>'required|max:255|min:8'
        ]);
        if(auth()->attempt($attr)){
            redirect('/projects')->send();
        }else{
            return back()->withInput()->withErrors(['email'=>'Zugangsdaten falsch']);
        }
    }
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','du hast dich erfolgreich abgemeldet');
    }
}
