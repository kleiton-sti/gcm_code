<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crachás - Guarda Civil Municipal</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/gcm-print.css') }}" media="print">
    
   
</head>

<body>

    <div class="pagina-titulo">
        <h1>Guarda Civil Municipal</h1>
        <span>Crachás para impressão &mdash; recorte pelas linhas tracejadas</span>
    </div>

    <div class="folha-crachas">
        @forelse ($guardasCivisAtivos as $guarda)
            @php
                // Geração do QR Code individual do guarda (mesmo padrão usado em gcm.show)
                $qrcodeCracha = null;
                try {
                    $ip = getHostByName(getHostName());
                    $urlCracha = 'http://' . $ip . '/gcm_code/gcm_code/public/gcms/' . $guarda->token;
                    $qrcodeCracha = (new \chillerlan\QRCode\QRCode())->render($urlCracha);
                } catch (\Throwable $e) {
                    $qrcodeCracha = null;
                }
            @endphp

            {{-- Cada crachá é uma unidade recortável e individualmente identificável (id = token do guarda) --}}
            <div class="cracha" id="cracha-{{ $guarda->token }}" data-guarda-id="{{ $guarda->id }}"
                data-guarda-token="{{ $guarda->token }}">
                <span class="marca-corte tl"></span>
                <span class="marca-corte tr"></span>
                <span class="marca-corte bl"></span>
                <span class="marca-corte br"></span>

                <span class="cracha-topo">
                    <span class="marca">GCM</span>
                    <span class="subtitulo">Crachá Funcional &mdash; Guarda Civil Municipal</span>
                </span>

                <table class="cracha-corpo">
                    <tr>
                        <td class="cracha-dados">
                            <span class="rotulo">Nome</span>
                            <span class="valor">{{ $guarda->nome }}</span>

                            <span class="rotulo">Matrícula</span>
                            <span class="valor">{{ $guarda->matricula }}</span>
                        </td>
                        <td class="cracha-qrcode">
                            {{-- Espaço reservado para o QR Code, também utilizável para download/recorte individual --}}
                            @if ($qrcodeCracha)
                                <img src="{{ $qrcodeCracha }}" alt="QR Code de validação de {{ $guarda->nome }}">
                            @else
                                <span class="qrcode-vazio">QR Code</span>
                            @endif
                        </td>
                    </tr>
                </table>

                <span class="cracha-rodape">Documento de identificação funcional</span>
            </div>
        @empty
            <p class="sem-registros">Nenhum guarda civil ativo encontrado.</p>
        @endforelse
    </div>

    <footer>
        <table class="footer-table">
            <tr>
                <td class="left">
                    <strong>Impresso por:</strong> {{ Auth::user()->nome }}
                    &nbsp;|&nbsp;
                    {{ now()->format('d/m/Y H:i') }}
                </td>
                <td class="right">
                    <span class="page-counter"></span>
                </td>
            </tr>
        </table>
    </footer>

</body>

</html>