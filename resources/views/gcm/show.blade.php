<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/987224752a.js" crossorigin="anonymous"></script>

    <title>Credencial - {{ $guarda['nome'] }}</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-body-tertiary">

    <div class="credencial-page">
        <div class="card credencial-card rounded-4">

            <div class="credencial-topo d-flex align-items-center justify-content-between">
                <span class="credencial-marca fw-bold">GCM</span>
                <span class="small">Credencial Digital</span>
            </div>

            <div class="card-body p-4">

                <div class="row align-items-center g-4">

                    <div class="col-md-4 text-center">
                        <x-ui.avatar
                            :src="$guarda['caminho_foto']"
                            :alt="$guarda['nome']"
                            :size="140"
                            class="credencial-foto"
                        />
                        <div class="mt-3">
                            <x-ui.status-badge :deletado="$guarda['deleted_at']" />
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="row credencial-dado">

                            <div class="col-12 mb-3">
                                <span class="form-label d-block">Nome</span>
                                <p class="fw-semibold mb-0">
                                    {{ $guarda['nome'] }}
                                </p>
                            </div>

                            <div class="col-6 mb-3">
                                <span class="form-label d-block">Matrícula</span>
                                <p class="mb-0">
                                    {{ $guarda['matricula'] }}
                                </p>
                            </div>

                            <div class="col-6 mb-3">
                                <span class="form-label d-block">CPF</span>
                                <p class="cpf mb-0">
                                    {{ $guarda['cpf'] }}
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <div class="row align-items-center g-4">
                    <div class="col-sm-8">
                        <p class="credencial-rodape text-muted mb-0">
                            Esta credencial é de uso exclusivo da Guarda Civil Municipal e comprova o vínculo
                            do(a) servidor(a) com a corporação.
                        </p>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-sm-end justify-content-center">
                        {{-- Espaço reservado para o QR Code de validação (a ser configurado) --}}
                        <div class="credencial-qrcode">
                            @if ($qrcode)                            
                            <img src="{{ $qrcode }}" alt="QR Code de validação">
                            @else
                            <i class="fa-solid fa-qrcode fa-2x"></i>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>
