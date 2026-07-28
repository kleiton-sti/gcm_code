@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Cadastro de Guarda Civil Municipal</h3>
    </div>

    <div class="card-body">

        <form action="#" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-3">

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input
                            type="file"
                            class="form-control"
                            id="foto"
                            name="foto"
                            accept="image/*">
                    </div>

                </div>

                <div class="col-md-9">

                    <div class="row">

                        <div class="col-md-8">

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nome"
                                    name="nome"
                                    placeholder="Nome completo">
                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="mb-3">
                                <label for="matricula" class="form-label">Matrícula</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="matricula"
                                    name="matricula"
                                    placeholder="Ex.: 123456">
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="cpf"
                                    name="cpf"
                                    placeholder="000.000.000-00">
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
                    <i class="bi bi-check-lg"></i>
                    Salvar
                </button>

            </div>

        </form>

    </div>

</div>

@endsection