<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [App\Http\Controllers\AutenticacaoController::class, 'realizarLogin'])->name('post.login');


Route::middleware(['auth'])->group(function () {

    Route::get('/gcms', function () {
        return view('gcm.index');
    })->name('home');

    Route::get('/buscar/gcm', [App\Http\Controllers\GuardaCivilController::class, 'BuscarExibirGuardasCivis'])->name('get.buscarGCM');

    Route::get('/registro', function () {
        return view('gcm.registro');
    })->name('regsitroGCM');

    Route::post('/registrar/gcm', [App\Http\Controllers\GuardaCivilController::class, 'registrarGCM'])->name('post.registroGCM');

    Route::get('/gcms/{id}', function ($id) {
        return view('gcm.show', ['id' => $id]);
    });

    Route::get('/usuarios', function () {
        return view('usuarios.create');
    })->name('paginaDeCadastro');

    Route::post('/cadastrar/usuario', [App\Http\Controllers\UsuariosController::class, 'realizarCadastro'])->name('post.cadastroUsuario');

    Route::get('/logout', [App\Http\Controllers\AutenticacaoController::class, 'realizarLogout'])->name('post.logout');
});




