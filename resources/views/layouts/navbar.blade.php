<nav class="app-header navbar navbar-expand bg-body">

    <div class="container-fluid">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"
                    aria-label="Mostrar/esconder sidebar">
                    <i class="fa-solid fa-bars" aria-hidden="true"></i>
                </a>
            </li>
        </ul>


        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('get.baixarQrCode')}}" class="nav-link"
                    aria-label="Baixar pasta de QrCodes" text="Download">
                    <i class="fa-solid fa-download mr-2" aria-hidden="true"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id='btnFullscreen' data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>


    </div>

</nav>