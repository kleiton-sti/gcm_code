@extends('layouts.guest')

@section('title', 'Entrar')

@section('content')

    <div class="card card-outline card-primary">

        <div class="card-header text-center border-0 pb-0">
            <a href="{{ url('/') }}" class="h1 text-decoration-none">
                <b>Sistema</b>GCM
            </a>
        </div>

        <div class="card-body">
            <p class="login-box-msg">Acesse com suas credenciais</p>

            <form action="#" method="POST">

                @csrf

                <x-form.input
                    name="email"
                    type="email"
                    icon="bi-envelope"
                    placeholder="Endereço de e-mail"
                    required
                />

                <x-form.input
                    name="senha"
                    type="password"
                    icon="bi-lock"
                    placeholder="Senha"
                    required
                />

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary d-block w-100">
                            Entrar
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

@endsection
