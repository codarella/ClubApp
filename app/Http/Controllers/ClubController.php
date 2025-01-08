<?php

namespace App\Http\Controllers;
use App\Models\Clubs;
use App\Models\User;



use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $clubs = Clubs::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%")
                         ->orWhere('president', 'like', "%{$search}%");
        })->get();
        return view('clubs.index', ['clubs' => $clubs]);
    }
    public function show(Clubs $club)
    {
        return view('clubs.show', ['club' => $club]);
      
    }
}
