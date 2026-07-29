<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/gcms', function () {
    return view('gcm.index');
});

Route::get('/gcms/{id}', function ($id) {
    return view('gcm.show', ['id' => $id]);
});

Route::get('/usuarios/cadastro', function () {
    return view('usuarios.create');
});
