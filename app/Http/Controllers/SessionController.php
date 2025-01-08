<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        // dd('hmmm');

        
        $attributes = request()->validate([
            'password'=>['required'],

            'email'=>['required','email'],
        ]);

        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=>'The credentials you have provided are incorrect'
            ]);
        }
   
        request()->session()->regenerate();
        return redirect('/');
    }
    public function destroy(){
        Auth::logout();
        return redirect('/');
    }}
