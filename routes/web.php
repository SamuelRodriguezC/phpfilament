<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return redirect('/employer');
});

Route::middleware(['role:admin'])->group(function () {
    // rutas protegidas por rol
});
