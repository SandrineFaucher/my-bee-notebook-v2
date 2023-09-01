<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Google Fonts / Pacifico et Comfortaa-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Pacifico&display=swap"
        rel="stylesheet">

    <!--Lien Fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm sticky-top" data-bs-theme="dark">
            <div class="container-fluid">

                <a class="navbar-brand" href="{{ url('home') }}">
                    <div class="logo d-flex ml-0">
                        <img src="{{ asset('images/logo-2-my-bee-notebook.png') }}" alt="logo-du-site" class="w-25">
                        <p class="my-auto fs-3">My-Bee-Notebook</p>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link fs-4 text-white"
                                        href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link fs-4 text-white"
                                        href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown text-center pe-5">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-4" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ strtoupper(Auth::user()->nom) }} {{ strtoupper(Auth::user()->prenom) }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end text-center drop-down-square me-5"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-white fs-4" aria-current="recoltes"
                                        href="{{ route('recoltes.index') }}">Mes récoltes </a>

                                    <a href="{{ route('users.edit', $user = Auth::user()) }}"
                                        class="dropdown-item text-white fs-4">
                                        Mon compte
                                    </a>
                                    <a class="dropdown-item text-white fs-4" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid text-center mt-5 pt-5">
                @if (session()->has('message'))
                    <p class="alert alert-success"> {{ session()->get('message') }} </p>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            @yield('content')
        </main>
    </div>

    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"
        integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

<footer>

    <div class="row" id="footer">
        <div class="col-md-3 mx-auto text-center">
            <i class="fa-regular fa-envelope my-auto fs-3 mt-5"> </i>
            <p>contact@mybeenotebook.fr</p>
        </div>
    </div>

</footer>

</html>
