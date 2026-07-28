<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class AutenticacaoController extends Controller
{

    public function realizarLogin(LoginRequest $credenciaisParaLogin)
    {
        $credenciais = $credenciaisParaLogin->only('email', 'password');

        if (Auth::attempt($credenciais)) {
            $usuarioVerificado = Auth::user();
            return response()->json(['success' => true, 'user' => $usuarioVerificado], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Credenciais inválidas'], 401);
        }
    }
}