<?php

use App\Http\Controllers\ClubController;
use Illuminate\Support\Facades\Route;
use App\Models\Clubs;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ProfileController;

Route::resource('clubs', ClubController::class);

Route::get('/', function () {
  
        if (Auth::check()) {
            $user = Auth::user();
            $clubs = $user->clubs()->select('clubs.id as club_id', 'clubs.name')->get(); // Fetch the IDs and names of the clubs with table aliases
        } else {
            $user = null;
            $clubs = collect(); // Empty collection
        }

    
    
        return view('home', compact('user', 'clubs'));
});

Route::get('/profile',[ProfileController::class,'index']);
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
// Route::post('/login',[RegisteredUserController::class,'store']);

// Route::post('/login', function () {
//     dd('Route works!');
// });
Route::post('/login', [SessionController::class, 'store']); 

Route::post('/logout',[SessionController::class,'destroy'])->name('logout');




Route::get('/explore', [ClubController::class, 'index'])->name('clubs.index'); // This is the route that will be used to search for clubs
Route::get('/explore/create', [ClubController::class, 'create'])->name('clubs.create');
Route::post('/explore', [ClubController::class, 'store'])->name('clubs.store');
Route::get('/explore/{club}', [ClubController::class, 'show'])->name("name: clubs.show"); // This is the route that will be used to view a club
Route::get('/explore/{club}/edit', [ClubController::class, 'edit'])->name('clubs.edit');
Route::patch('/explore/{club}', [ClubController::class, 'update'])->name('clubs.update');
Route::delete('/explore/{club}', [ClubController::class, 'destroy'])->name('clubs.destroy');
Route::post('/explore/{club}/join', [ClubController::class, 'join'])->name('clubs.join');
Route::delete('/explore/{club}/leave', [ClubController::class, 'leave'])->name('clubs.leave');
