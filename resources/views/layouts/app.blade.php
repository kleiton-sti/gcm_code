<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Sistema')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">


        {{-- Navbar --}}
        @include('layouts.navbar')


        {{-- Sidebar --}}
        @include('layouts.sidebar')


        <main class="app-main">

            @yield('content')

        </main>


    </div>

</body>

</html>