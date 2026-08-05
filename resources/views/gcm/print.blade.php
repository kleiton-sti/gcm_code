<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crachás - Guarda Civil Municipal</title>

    <style>
        @page {
            margin: 1.2cm 1cm 2cm 1cm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #222;
            margin: 0;
        }

        .pagina-titulo {
            text-align: center;
            margin-bottom: 0.6cm;
        }

        .pagina-titulo h1 {
            font-size: 16px;
            margin: 0 0 2px 0;
        }

        .pagina-titulo span {
            font-size: 10px;
            color: #666;
        }

        /* Grade de crachás */
        .folha-crachas {
            width: 100%;
            font-size: 0;
            /* remove espaço entre inline-blocks */
        }

        .cracha {
            width: 9cm;
            height: 5.4cm;
            display: inline-block;
            vertical-align: top;
            margin: 0.25cm;
            border: 1px dashed #999;
            border-radius: 6px;
            padding: 0.3cm;
            position: relative;
            page-break-inside: avoid;
            font-size: 11px;
        }

        /* Marcas de corte nos cantos */
        .marca-corte {
            position: absolute;
            width: 8px;
            height: 8px;
            border-color: #aaa;
        }

        .marca-corte.tl {
            top: -1px;
            left: -1px;
            border-top: 1px solid;
            border-left: 1px solid;
        }

        .marca-corte.tr {
            top: -1px;
            right: -1px;
            border-top: 1px solid;
            border-right: 1px solid;
        }

        .marca-corte.bl {
            bottom: -1px;
            left: -1px;
            border-bottom: 1px solid;
            border-left: 1px solid;
        }

        .marca-corte.br {
            bottom: -1px;
            right: -1px;
            border-bottom: 1px solid;
            border-right: 1px solid;
        }

        .cracha-topo {
            display: block;
            border-bottom: 1px solid #ddd;
            padding-bottom: 3px;
            margin-bottom: 6px;
        }

        .cracha-topo .marca {
            font-weight: bold;
            font-size: 12px;
            letter-spacing: 1px;
        }

        .cracha-topo .subtitulo {
            font-size: 9px;
            color: #777;
            display: block;
        }

        .cracha-corpo {
            width: 100%;
            border-collapse: collapse;
        }

        .cracha-corpo td {
            vertical-align: middle;
            padding: 0;
        }

        .cracha-dados {
            width: 65%;
        }

        .cracha-dados .rotulo {
            display: block;
            font-size: 8px;
            text-transform: uppercase;
            color: #888;
            margin-top: 6px;
        }

        .cracha-dados .rotulo:first-child {
            margin-top: 0;
        }

        .cracha-dados .valor {
            display: block;
            font-size: 12px;
            font-weight: bold;
        }

        .cracha-qrcode {
            width: 35%;
            text-align: center;
        }

        .cracha-qrcode img {
            width: 2.2cm;
            height: 2.2cm;
        }

        .cracha-qrcode .qrcode-vazio {
            width: 2.2cm;
            height: 2.2cm;
            border: 1px dashed #bbb;
            display: inline-block;
            text-align: center;
            line-height: 2.2cm;
            font-size: 8px;
            color: #999;
        }

        .cracha-rodape {
            display: block;
            margin-top: 6px;
            font-size: 7px;
            color: #999;
            text-align: center;
        }

        .sem-registros {
            text-align: center;
            color: #777;
            margin-top: 1cm;
        }

        /* Rodapé de impressão */
        footer {
            position: fixed;
            bottom: -1.4cm;
            left: 0;
            right: 0;
        }

        .footer-table {
            width: 100%;
            font-size: 9px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 4px;
        }

        .footer-table .left {
            text-align: left;
        }

        .footer-table .right {
            text-align: right;
        }
    </style>
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
            <div class="cracha" id="cracha-{{ $guarda->token }}" data-guarda-id="{{ $guarda->id }}" data-guarda-token="{{ $guarda->token }}">
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
