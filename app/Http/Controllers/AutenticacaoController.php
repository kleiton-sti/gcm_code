<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;


class AutenticacaoController extends Controller
{

    public function realizarLogin(LoginRequest $credenciaisParaLogin)
    {
        try {

            if (!Auth::attempt($credenciaisParaLogin->only('email', 'password'))) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'email' => 'O E-mail e/ou Senha estão incorretos.',
                    ]);
            }
            ;

            $credenciaisParaLogin->session()->regenerate();

            return redirect()->route('home');


        } catch (\Throwable $e) {

            Log::warning('Erro ao realizar login: ', ['email' => $credenciaisParaLogin->email, 'error' => $e->getMessage()]);

            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Ocorreu um erro ao realizar o login.',
                ]);

        }

    }

    public function realizarLogout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('paginaDeLogin');
            
        } catch (\Throwable $e) {
            Log::warning('Erro ao realizar logout: ', ['error' => $e->getMessage()]);
            return back()->with('error', 'Ocorreu um erro ao realizar o logout.');
        }

    }
}