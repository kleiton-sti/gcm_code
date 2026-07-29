@extends('layouts.app')

@section('title', 'home')

@section('content')

    <x-ui.page-header
        title="Dashboard"
        subtitle="Cadastro de Guarda Civil Municipal"
    />

    <div class="app-content">
        <div class="container-fluid">

            <x-ui.card title="Dados do GCM">

                <form action="{{ route('post.registroGCM') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        <div class="col-md-3">
                            <x-form.photo-upload name="foto" label="Foto" />
                        </div>

                        <div class="col-md-9">
                            <div class="row">

                                <div class="col-md-8">
                                    <x-form.input
                                        name="nome"
                                        label="Nome"
                                        placeholder="Nome completo"
                                        required
                                    />
                                </div>

                                <div class="col-md-4">
                                    <x-form.input
                                        name="matricula"
                                        label="Matrícula"
                                        placeholder="Ex.: 123456"
                                        required
                                    />
                                </div>

                                <div class="col-md-6">
                                    <x-form.input
                                        name="cpf"
                                        label="CPF"
                                        placeholder="000.000.000-00"
                                        required
                                    />
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
                            <i class="bi bi-check-lg"></i>
                            Salvar
                        </button>

                    </div>

                </form>

            </x-ui.card>

        </div>
    </div>

@endsection
