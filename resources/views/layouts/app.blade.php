<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'library') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss'],['resources/js/app.js'])
</head>
<body>
    <div id="app" class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark shadow">
                <a class="navbar-brand ps-3 " href="{{ url('/') }}">
                    <h1 class="mybanner ">Library</h1>
                </a><button class="btn btn-link  btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars" color="red"></i></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else<li class="nav-item">
                                    <a class="nav-link" href="{{url('/profile/'. Auth::user()->id)}}">{{ __('Profile') }}</a>
                                </li>

                            <li class="nav-item">
                                <a class="nav-link mx-5" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>  
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
