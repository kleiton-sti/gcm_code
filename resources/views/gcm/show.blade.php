@extends('layouts.app')

@section('title', 'Detalhes do GCM')

@section('content')

    @php
        // Dados fictícios exibidos independente do identificador informado na rota
        $guarda = [
            'foto' => 'https://i.pravatar.cc/200?img=12',
            'nome' => 'Carlos Eduardo Silva',
            'matricula' => '000123',
            'cpf' => '123.456.789-00',
            'status' => 'Ativo',
        ];
    @endphp

    <x-ui.page-header title="Detalhes do GCM" subtitle="Visualização somente leitura">
        <x-slot:actions>
            <a href="{{ url('/gcms') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar para a lista
            </a>
        </x-slot:actions>
    </x-ui.page-header>

    <div class="app-content">
        <div class="container-fluid">

            <x-ui.card title="Dados do GCM">

                <div class="row">

                    <div class="col-md-3 text-center">
                        <x-ui.avatar
                            :src="$guarda['foto']"
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
                                <p class="form-control-plaintext border rounded px-2 mb-0">
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
