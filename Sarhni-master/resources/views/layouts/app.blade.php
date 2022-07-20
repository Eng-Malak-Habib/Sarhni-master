<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>footer {
            text-align: center;
            padding: 3px;
            background-color:#10BBB3;
            color: white;
            position: fixed;
            bottom: 60px;
            width: 100%;
            height: 2.5rem;
        }</style>
    <style>

    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>sarhni</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer> </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background: #10BBB3" >
    <div id="app" >
        <nav class="navbar navbar-light" style="background-color: #008B8B;">
            <div class="container" >
                <a class="navbar-brand" style="color: #4dc0b5" href="{{ url('/') }}"> Sarhni </a>
                <img src="/user-profile/Sarahah_logo_2.png" class="navbar-brand-img" style="height: 20px; width: 20px">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item" style="">
                                <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }} </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item ">
                                <a  class="nav-link" href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a  class="nav-link" href="{{ route('profile.edit') }}">
                                    Profile
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a  class="nav-link" href="{{ route('message.index') }}">
                                    Messages({{\App\Models\Message::where('user_id',Auth::id())->count()}})
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
            @yield('content')
        </main>

    </div>

    <div>
        <footer>
            <h1>Sarhni</h1>
            <a class="navbar-brand"  href="{{ url('/') }}"> Sarhni </a>
            <a class="navbar-brand" style="color: #FFFFFF" href="https://www.facebook.com/gamal.ashraf.92/">Creator: Gamal Ashraf</a>

        </footer>
    </div>

</body>
</html>
