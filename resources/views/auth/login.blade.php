@extends('layouts.guest')

@section('title', 'Entrar')

@section('content')

    <div class="card card-outline card-primary">

        <div class="card-header text-center border-0 pb-0">
            <img
                src="{{ asset('img/brasao.png') }}"
                alt="Brasão da Prefeitura de Caraguatatuba"
                class="login-brasao mb-2"
            >
            <a href="{{ url('/') }}" class="h1 text-decoration-none d-block">
                <b>Sistema</b>GCM
            </a>
        </div>

        <div class="card-body">
            <p class="login-box-msg">Acesse com suas credenciais</p>

            <form action="{{ route('post.login') }}" method="POST">

                @csrf

                <x-form.input
                    name="email"
                    type="email"
                    icon="fa-regular fa-envelope"
                    placeholder="Endereço de e-mail"
                    required
                />

                <x-form.input
                    name="password"
                    type="password"
                    icon="fa-solid fa-lock"
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
