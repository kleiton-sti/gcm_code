<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroNovosUsuariosRequest;

class UsuariosController extends Controller
{

    public function abrirPaginaDeCadastro() {
        return view('cadastro-novos-usuarios');
    }

    public function realizarCadastro(CadastroNovosUsuariosRequest $request)
    {
        // chamar service para realizar cadastro de novo usuário
        return response()->json(['success' => true, 'message' => 'Usuário cadastrado com sucesso!'], 200);  

    }
}