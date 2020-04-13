<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('settings.title', '') }}</title>
    <meta name="robots" content="noindex">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @yield('header')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if( url()->current() == route('form') || url()->current() == url('/') )
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    @endif
</head>

<body>
    <div id="app" class="page{{ url()->current() == url('/') ? ' welcome' : '' }}">
        <div class="page-top">
            <nav class="navbar navbar-dark bg-secondary shadow-sm px-0">
                <div class="container">
                    <a class="navbar-brand text-uppercase" href="{{ url('/') }}">{{ config('settings.name', '') }}</a>

                    <ul class="navbar-nav ml-auto mr-n2 flex-row">
                        @guest
                        <li class="nav-item px-2">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @else
                        <li class="nav-item px-2">
                            <a class="nav-link{{ url()->current() == route('home') ? ' active' : '' }}"
                                href="{{ route('home') }}">Data Masuk</a>
                        </li>
                        @if( 1 == Auth::user()->id )
                        <li class="nav-item dropdown px-2">
                            <a id="navbarDropdown"
                                class="nav-link dropdown-toggle{{ url()->current() == route('pass') ? ' active' : '' }}"
                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                v-pre>Admin <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                                style="position:absolute">
                                <a class="dropdown-item" href="{{ route('pass') }}">Ganti sandi</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            </div>
                        </li>
                        @else
                        <li class="nav-item px-2">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        </li>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endguest
                    </ul>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <footer class="page-bot border-top bg-light py-3">
            <div class="container small text-muted">
                <div class="row justify-content-between">
                    <div class="col-auto">&copy; 2020 {{ config('settings.foot', '') }}.</div>
                    <div class="col-auto">Supported by: <a href="//sporaenterprise.com/" class="text-reset">Spora Optima
                            Global</a>.</div>
                </div>
            </div>
        </footer>
    </div>
</body>

@yield('footer')

</html>