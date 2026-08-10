<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarIpRedePrefeitura
{
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();

        $redePermitida = config('rede_prefeitura.rede_permitida');

        if (! $this->ipPermitido($ip, $redePermitida)) {
            abort(403, 'Acesso permitido somente pela rede da Prefeitura.');
        }

        return $next($request);
    }

    private function ipPermitido(string $ip, string $rede): bool
    {
        // para acesso local com ::1
        if (! str_contains($rede, '/')) {
            return $ip === $rede;
        }
       
        [$redeIp, $prefixo] = explode('/', $rede);

        $ipLong = ip2long($ip);
        $redeLong = ip2long($redeIp);

        if ($ipLong === false || $redeLong === false) {
            return false;
        }

        $mascara = -1 << (32 - (int) $prefixo);

        return ($ipLong & $mascara) === ($redeLong & $mascara);
    }
}