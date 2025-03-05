<?php
namespace App\Http\Controllers;

use App\Models\Clubs;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
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
        })->latest()->paginate(10); // Paginate with 10 clubs per page
        return view('clubs.index', ['clubs' => $clubs]);
    }

    public function show(Clubs $club)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $clubs = $user->clubs()->select('clubs.id as club_id', 'clubs.name')->get(); // Fetch the IDs and names of the clubs with table aliases
        } else {
            $user = null;
            $clubs = collect(); // Empty collection
        }

        // $club->load('announcements'); // Eager load announcements
        return view('clubs.show', compact('club', 'clubs'));
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
        ]);

        // Assign the president field to the name of the currently authenticated user
        $validated['president'] = Auth::user()->name;
        $validated['founded'] = now();


        $club = Clubs::create($validated);
        $user = auth()->user();
        $club->load('users');

        $club->users()->attach($user, ['role' => 'owner']);

        return redirect()->route('clubs.show', $club)->with('info','Club created successfully');
    }

    public function edit(Clubs $club)
    {
        Gate::authorize('edit-club', $club);
        return view('clubs.edit', ['club' => $club]);
    }

    public function update(Request $request, Clubs $club)
    {
        Gate::authorize('edit-club', $club);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_email' => 'required|email',
        ]);

        $club->update($validated);

        return redirect()->route('clubs.index');

        
    }
    public function join(Request $request, Clubs $club)
    
{
    $user = auth()->user();
    $club->load('users');

     // Check if the user is already a member of the club
     if ($club->users->contains($user)) {
        return redirect()->back()->with('info', 'You are already a member of this club.');
    }

    // Add the user to the club
    $club->users()->attach($user->id);

    return redirect()->back()->with('success', 'You have successfully joined the club!');

}
public function leave(Request $request, Clubs $club){
    $user = Auth::user();
    Gate::authorize('is-Member', $club);

    // Check if the user is a member of the club
    if (!$club->users->contains($user)) {
        return redirect()->back()->with('error', 'You are not a member of this club.');
    }

    // Remove the user from the club
    $club->users()->detach($user->id);

    return redirect()->back()->with('info', 'You have successfully left the club.');}

    

    public function destroy(Clubs $club)
    {
        Gate::authorize('edit-club', $club);

        $club->delete();

        return redirect()->route('clubs.index');
    }
}