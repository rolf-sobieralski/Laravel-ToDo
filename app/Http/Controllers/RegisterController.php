<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    //
    public function create(){
        return view('register.create');
    }
    public function store(){
        $attr = request()->validate([
            'name'=>'required|max:255|min:6',
            'email'=>'required|email|max:255|min:6',
            'password'=>'required|max:255|min:8'
        ]);
        $attr['password'] = bcrypt($attr['password']);
        var_dump($attr);
        $user = User::create($attr);

        auth()->login($user);
        return redirect('/')->with('success','Benutzerkonto wurde erfolgreich angelegt');

    }
}
