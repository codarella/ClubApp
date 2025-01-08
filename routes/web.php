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


// Route::get('/explore', function () {
// dd("Hello");
// });

Route::get('/explore', [ClubController::class, 'index']); // This is the route that will be used to search for clubs
Route::get('/explore/{club}', [ClubController::class, 'show']); // This is the route that will be used to view a club