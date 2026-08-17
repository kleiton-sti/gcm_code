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
                                <p class="mb-0">
                                    {{ $guarda->cpf_formatado }}
                                </p>
                            </div>

                            <div class="col-6 mb-3">
                                <span class="form-label d-block">Cargo</span>
                                <p class="mb-0">
                                    {{ $guarda['cargo'] }}
                                </p>
                            </div>

                            <div class="col-6 mb-3">
                                <span class="form-label d-block">Afiliação</span>
                                <p class="mb-0">
                                    {{ $guarda['afiliacao'] }}
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <div class="row credencial-dado">

                    <h6 class="text-muted mb-3">Dados pessoais</h6>

                    <div class="col-md-4 col-6 mb-3">
                        <span class="form-label d-block">RG</span>
                        <p class="mb-0">
                            {{ $guarda->rg_formatado }}
                        </p>
                    </div>

                    <div class="col-md-4 col-6 mb-3">
                        <span class="form-label d-block">Data de nascimento</span>
                        <p class="mb-0">
                            {{ $guarda->data_nascimento_formatada }}
                        </p>
                    </div>

                    <div class="col-md-4 col-6 mb-3">
                        <span class="form-label d-block">Tipo sanguíneo</span>
                        <p class="mb-0">
                            {{ $guarda['tipo_sanguineo'] }}
                        </p>
                    </div>

                    <div class="col-md-4 col-6 mb-3">
                        <span class="form-label d-block">Nome da mãe</span>
                        <p class="mb-0">
                            {{ $guarda['nome_mae'] }}
                        </p>
                    </div>

                    <div class="col-md-4 col-6 mb-3">
                        <span class="form-label d-block">Nome do pai</span>
                        <p class="mb-0">
                            {{ $guarda['nome_pai'] }}
                        </p>
                    </div>

                    <div class="col-md-4 col-6 mb-3">
                        <span class="form-label d-block">Naturalidade</span>
                        <p class="mb-0">
                            {{ $guarda['naturalidade'] }} / {{ $guarda['estado'] }}
                        </p>
                    </div>

                    <h6 class="text-muted mb-3 mt-2">Dados funcionais</h6>

                    <div class="col-md-3 col-6 mb-3">
                        <span class="form-label d-block">Porte</span>
                        <p class="mb-0">
                            {{ $guarda['porte'] }}
                        </p>
                    </div>

                    <div class="col-md-3 col-6 mb-3">
                        <span class="form-label d-block">Admissão</span>
                        <p class="mb-0">
                            {{ \Carbon\Carbon::parse($guarda['admissao'])->format('d/m/Y') }}
                        </p>
                    </div>

                    <div class="col-md-3 col-6 mb-3">
                        <span class="form-label d-block">Expedição</span>
                        <p class="mb-0">
                            {{ \Carbon\Carbon::parse($guarda['expedicao'])->format('d/m/Y') }}
                        </p>
                    </div>

                    <div class="col-md-3 col-6 mb-3">
                        <span class="form-label d-block">Validade</span>
                        <p class="mb-0">
                            {{ \Carbon\Carbon::parse($guarda['validade'])->format('d/m/Y') }}
                        </p>
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
