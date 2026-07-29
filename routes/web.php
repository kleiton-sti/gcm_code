<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/login', [App\Http\Controllers\AutenticacaoController::class, 'realizarLogin'])->name('post.login');


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::post('/registro', [App\Http\Controllers\GuardaCivilController::class, 'registrarGCM'])->name('post.registroGCM');

Route::get('/gcms', function () {
    return view('gcm.index');
});

Route::get('/gcms/{id}', function ($id) {
    return view('gcm.show', ['id' => $id]);
});

Route::get('/usuarios/cadastro', function () {
    return view('usuarios.create');
});
