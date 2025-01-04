<?php

use Illuminate\Support\Facades\Route;
use App\Models\Clubs;

Route::get('/', function () {
    return view('home');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/explore', function () {
    $clubs = Clubs::all();
    return view('explore', ['clubs' => $clubs]);
});