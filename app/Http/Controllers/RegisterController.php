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
            'mail'=>'required|email|max:255|min:6',
            'pass'=>'required|max:255|min:8',
            'passrepeat'=>'required|max:255|min:8'
        ]);
        $credentials['name'] = $attr['name'];
        $credentials['email'] = $attr['mail'];
        $credentials['password'] = $attr['pass'];
        User::create($credentials);
    }
}
