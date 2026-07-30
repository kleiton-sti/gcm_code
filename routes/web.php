<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [App\Http\Controllers\AutenticacaoController::class, 'realizarLogin'])->name('post.login');


Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::post('/registro/gcm', [App\Http\Controllers\GuardaCivilController::class, 'registrarGCM'])->name('post.registroGCM');

    Route::get('/gcms', function () {
        return view('gcm.index');
    });

    Route::get('/gcms/{id}', function ($id) {
        return view('gcm.show', ['id' => $id]);
    });

    Route::get('/usuarios', function () {
        return view('usuarios.create');
    })->name('paginaDeCadastro');

    Route::post('/cadastro/usuario', [App\Http\Controllers\UsuariosController::class, 'realizarCadastro'])->name('post.cadastroUsuario');

    Route::get('/logout', [App\Http\Controllers\AutenticacaoController::class, 'realizarLogout'])->name('post.logout');
});




