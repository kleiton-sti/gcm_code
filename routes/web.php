<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [App\Http\Controllers\AutenticacaoController::class, 'realizarLogin'])->name('post.login');


Route::middleware(['auth'])->group(function () {

    Route::get('/gcms', [App\Http\Controllers\GuardaCivilController::class, 'encaminharParaIndex'])->name('home');
    
    Route::get('/registro', function () { return view('gcm.registro');})->name('regsitroGCM');

    Route::post('/registrar/gcm', [App\Http\Controllers\GuardaCivilController::class, 'registrarGCM'])->name('post.registroGCM');

    Route::get('/gcms/{id}', [App\Http\Controllers\GuardaCivilController::class, 'visualizarDadosDoGCM'])->name('get.visualizarGCM');
    
    Route::get('/usuarios', function () { return view('usuarios.create');})->name('paginaDeCadastro');

    Route::post('/cadastrar/usuario', [App\Http\Controllers\UsuariosController::class, 'realizarCadastro'])->name('post.cadastroUsuario');

    Route::get('/logout', [App\Http\Controllers\AutenticacaoController::class, 'realizarLogout'])->name('post.logout');

    Route::get('/gcms/{id}/editar', [App\Http\Controllers\GuardaCivilController::class, 'exibirBladeDeEdicao'])->name('get.editarGCM');

    Route::put('/gcms/{id}/salvar', [App\Http\Controllers\GuardaCivilController::class, 'atualizarDadosDoGCM'])->name('post.atualizarGCM');

    Route::delete('gcms/{id}/inativar', [App\Http\Controllers\GuardaCivilController::class, 'inativarGCM'])->name('post.inativarGCM');
});




