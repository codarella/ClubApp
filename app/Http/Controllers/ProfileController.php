<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
            $clubs = $user->clubs()->select('clubs.id as club_id', 'clubs.name')->get(); // Fetch the IDs and names of the clubs with table aliases
        } else {
            $user = null;
            $clubs = collect(); // Empty collection
        }

        return view('profile', compact('user', 'clubs'));
    }
    }

