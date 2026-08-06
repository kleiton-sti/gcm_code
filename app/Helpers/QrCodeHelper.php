<?php

namespace App\Helpers;

use chillerlan\QRCode\QRCode;
use Illuminate\Support\Facades\Log;

class QrCodeHelper
{   
    public static function gerarQrCode($token)
    {
      try {
        
        // $url = config('app.url'). $token;
    
        $ip = getHostByName(getHostName());
    
        $url = 'http://' . $ip . '/gcm_code/gcm_code/public/gcms/' . $token;
    
        $qrcode = (new QRCode())->render($url);
    
        return $qrcode;
      } catch (\Throwable $e) {
        Log::warning('Erro ao exibir dados do GCM: ', ['error' => $e->getMessage()]);
        return redirect()->route('home')->with('error', 'Ocorreu um erro ao exibir os dados do GCM.');
      }
    }
}
  