<?php

use App\Http\Controllers\ClubController;
use Illuminate\Support\Facades\Route;
use App\Models\Clubs;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/profile', function () {
    return view('profile');
});
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
