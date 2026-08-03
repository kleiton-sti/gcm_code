@extends('layouts.app')

@section('title', 'Detalhes do GCM')

@section('content')


    <x-ui.page-header title="Detalhes do GCM" subtitle="Visualização somente leitura">
        <x-slot:actions>
            <a href="{{ url('/gcms') }}" class="btn btn-outline-secondary">
                <i class="fa-regular fa-circle-left"></i> Voltar para a lista
            </a>
        </x-slot:actions>
    </x-ui.page-header>

    <div class="app-content">
        <div class="container-fluid">

            <x-ui.card title="Dados do GCM">

                <div class="row">

                    <div class="col-md-3 text-center">
                        <x-ui.avatar
                            :src="$guarda['caminho_foto']"
                            :alt="$guarda['nome']"
                            :size="150"
                        />
                    </div>

                    <div class="col-md-9">
                        <div class="row">

                            <div class="col-md-8 mb-3">
                                <span class="form-label d-block">Nome</span>
                                <p class="form-control-plaintext border rounded px-2 mb-0">
                                    {{ $guarda['nome'] }}
                                </p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <span class="form-label d-block">Matrícula</span>
                                <p class="form-control-plaintext border rounded px-2 mb-0">
                                    {{ $guarda['matricula'] }}
                                </p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <span class="form-label d-block">CPF</span>
                                <p class="cpf form-control-plaintext border rounded px-2 mb-0">
                                    {{ $guarda['cpf'] }}
                                </p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <span class="form-label d-block">Status</span>
                                <div>
                                    <x-ui.status-badge :status="$guarda['status']" />
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </x-ui.card>

        </div>
    </div>

@endsection
