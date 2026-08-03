@extends('layouts.app')

@section('title', 'Detalhes do GCM')

@section('content')


    <x-ui.page-header title="Detalhes do GCM" subtitle="Editar dados do GCM">
        <x-slot:actions>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                <i class="fa-regular fa-circle-left"></i> Voltar para a lista
            </a>
        </x-slot:actions>
    </x-ui.page-header>

    <div class="app-content">
        <div class="container-fluid">

            <x-ui.card title="Dados do GCM">

                <form action="{{ route('post.atualizarGCM', ['id' => $guarda['id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-3 text-center">
                            <x-form.photo-upload
                                name="foto"
                                label="Foto"
                                :preview="$guarda['caminho_foto'] ? asset('storage/' . $guarda['caminho_foto']) : null"
                            />
                        </div>

                        <div class="col-md-9">
                            <div class="row">

                                <div class="col-md-8 mb-3">
                                    <x-form.input
                                        name="nome"
                                        label="Nome"
                                        placeholder="Nome completo"
                                        value="{{ old('nome', $guarda['nome']) }}"
                                        required
                                    />
                                </div>

                                <div class="col-md-4 mb-3">
                                    <x-form.input
                                        name="matricula"
                                        label="Matrícula"
                                        placeholder="Ex.: 123456"
                                        value="{{ old('matricula', $guarda['matricula']) }}"
                                        required
                                    />
                                </div>

                                <div class="col-md-4 mb-3">
                                    <x-form.input
                                        name="cpf"
                                        class="cpf"
                                        label="CPF"
                                        placeholder="000.000.000-00"
                                        value="{{ old('cpf', $guarda['cpf']) }}"
                                        required
                                    />
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

                    <hr>

                    <div class="d-flex justify-content-end">

                        <button type="reset" class="btn btn-secondary me-2">
                            Limpar
                        </button>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa-regular fa-circle-check"></i>
                            Salvar
                        </button>

                    </div>

                </form>

            </x-ui.card>

        </div>
    </div>

@endsection
