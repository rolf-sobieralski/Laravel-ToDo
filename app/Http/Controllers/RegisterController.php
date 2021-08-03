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
        var_dump($attr);
        User::create($attr);

    }
}
