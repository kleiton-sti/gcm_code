<aside class="app-sidebar bg-dark shadow">

    <div class="sidebar-brand">

        <a href="{{ route('home') }}" class="brand-link text-white d-flex align-items-center">
            <img src="{{ asset('img/brasao.png') }}" alt="Brasão da Prefeitura de Caraguatatuba" class="brand-brasao">
            <span class="brand-text text-white">GCM</span>
        </a>

    </div>

    <div class="sidebar-user-box d-flex align-items-center">
        <div class="sidebar-user-avatar">
            <i class="fa-solid fa-circle-user"></i>
        </div>
        <div class="sidebar-user-info">
            <p class="sidebar-user-nome mb-0">{{ Auth::user()->nome }}</p>
            <p class="sidebar-user-email mb-0">{{ Auth::user()->email }}</p>
        </div>
    </div>


    <div class="sidebar-wrapper">

        <nav>

            <ul class="nav sidebar-menu flex-column">


                <li class="nav-item">
                    <a href="{{ route('home') }}" class="menu-ajax nav-link d-flex align-items-center text-white">
                        <i class="fa-regular fa-address-book"></i>
                        <p class="mb-0">
                            Guardas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('regsitroGCM') }}" class="menu-ajax nav-link d-flex align-items-center text-white"
                        @cannot('terceirizado-nao-pode')
                        onclick="return confirm('Somente servidores podem registrar GCM')" @endcannot>
                        <i class="fa-regular fa-id-card"></i>
                        <p class="mb-0">
                            Registro de GCM
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('paginaDeCadastro') }}"
                        class="menu-ajax nav-link d-flex align-items-center text-white" @cannot('terceirizado-nao-pode')
                        onclick="return confirm('Somente servidores podem cadastrar usuários')" @endcannot
                        @cannot('semob-nao-pode')
                        onclick="return confirm('Somente usuários da STII podem cadastrar usuários')" @endcannot>
                        <i class="fa-regular fa-user"></i>
                        <p class="mb-0">
                            Cadastro de Usuário
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('post.logout') }}" class="nav-link d-flex align-items-center text-white">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p class="mb-0">
                            Sair
                        </p>
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>