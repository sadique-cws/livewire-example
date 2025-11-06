<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::match(["get","post"],"/logout", function(){
    auth()->logout();
    return redirect("/login");
})->name("logout");
