<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crachás - Guarda Civil Municipal</title>
    <style>
        {!! file_get_contents(resource_path('css/pages/gcm-print.css')) !!}
    </style>
</head>

<body>

    <div class="pagina-titulo">
        <h1>Guarda Civil Municipal</h1>
        <span>Crachás para impressão &mdash; recorte pelas linhas tracejadas</span>
    </div>

    <div class="folha-crachas">
        @forelse ($guardasCivisAtivos as $guarda)

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
                        <td class="cracha-qrcode"
                        
                                <img src="{{ route('get.qrcode', ['token' => $guarda->token]) }}" alt="QR Code de validação de {{ $guarda->nome }}">
                        </td>
                    </tr>
                </table>

                <span class="cracha-rodape">Documento de identificação funcional</span>
            </div>
        @empty
            <p class="sem-registros">Nenhum guarda civil ativo encontrado.</p>
        @endforelse
    </div>

</body>

</html>