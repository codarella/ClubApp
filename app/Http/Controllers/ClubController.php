<?php
namespace App\Http\Controllers;

use App\Models\Clubs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClubController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $clubs = Clubs::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%")
                         ->orWhere('president', 'like', "%{$search}%");
        })->paginate(10); // Paginate with 10 clubs per page
        return view('clubs.index', ['clubs' => $clubs]);
    }

    public function show(Clubs $club)
    {
        $club->load('announcements'); // Eager load announcements
        return view('clubs.show', ['club' => $club]);
    }

    public function create()
    {
        return view('clubs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_email' => 'required|email',
            'president' => User::where('id', Auth::id())->first()->name,
        ]);

        $club = Clubs::create($validated);
        // $club->users()->attach(Auth::id(), ['role' => 'owner']);

        return redirect()->route('clubs.show', $club);
    }

    public function edit(Clubs $club)
    {
        return view('clubs.edit', ['club' => $club]);
    }

    public function update(Request $request, Clubs $club)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_email' => 'required|email',
        ]);

        $club->update($validated);

        return redirect()->route('clubs.index');
        
    }

    public function destroy(Clubs $club)
    {
        $club->delete();

        return redirect()->route('clubs.index');
    }
}