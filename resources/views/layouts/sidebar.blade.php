<aside class="app-sidebar bg-dark shadow">

    <div class="sidebar-brand">

        <a href="{{ url('/') }}" class="brand-link text-white">
            GCM
        </a>

    </div>


    <div class="sidebar-wrapper">

        <nav>

            <ul class="nav sidebar-menu flex-column">

                
                <li class="nav-item">
                    <a href="{{ route('get.buscarGCM') }}" class="nav-link">
                        <i class="bi bi-people"></i>
                        <p>
                            Guardas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('regsitroGCM') }}" class="nav-link" @cannot('terceirizado-nao-pode') onclick="return confirm('Somente servidores podem registrar GCM')" @endcannot>
                        <i class="bi bi-speedometer2"></i>
                        <p>
                            Registro de GCM
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('paginaDeCadastro') }}" class="nav-link" @cannot('terceirizado-nao-pode') onclick="return confirm('Somente servidores podem cadastrar usuários')" @endcannot  @cannot('semob-nao-pode') onclick="return confirm('Somente usuários da STII podem cadastrar usuários')" @endcannot>
                        <i class="bi bi-person-plus"></i>
                        <p>
                            Cadastro de Usuário
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('post.logout') }}" class="nav-link">
                        <i class="bi bi-person-plus"></i>
                        <p>
                            Sair
                        </p>
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>
