<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/like.js') }}" defer></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('hiyari.new') }}">新着順に表示</a>
                                    <a class="dropdown-item" href="{{ route('hiyari.ranking') }}">人気ランキング</a>
                                    <a class="dropdown-item" href="{{ route('home') }}">検索する</a>
                                    <a class="dropdown-item" href="{{ route('hiyari.create') }}">投稿する</a>
                                    <a class="dropdown-item" href="{{ route('user.index') }}">ユーザー情報を確認する</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}

                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
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
        <div class="container-fluid futmenu d-lg-none">
            <div class="row justify-content-center secondry">

                {{-- アンダーメニューの表示と色の判定 --}}
                @if (route('hiyari.new') == url()->current() or route('hiyari.new.holiday') == url()->current())
                    <a class="col" href="{{ route('hiyari.new') }}">
                        <i class="material-icons undermenu-icon-clicked">home</i>
                    </a>

                @else
                    <a class="col" href="{{ route('hiyari.new') }}">
                        <i class="material-icons undermenu-icon">home</i>
                    </a>
                @endif
                
                @if (route('hiyari.ranking') == url()->current() or route('hiyari.ranking.holiday') == url()->current())
                    <a class="col" href="{{ route('hiyari.ranking') }}">
                        <i class="material-icons undermenu-icon-clicked">emoji_events</i>
                    </a>

                @else
                    <a class="col" href="{{ route('hiyari.ranking') }}">
                        <i class="material-icons undermenu-icon">emoji_events</i>
                    </a>
                @endif


                @if (route('home') == url()->current())
                    <a class="col" href="{{ route('home') }}">
                        <i class="material-icons undermenu-icon-clicked">search</i>
                    </a>

                @else
                    <a class="col" href="{{ route('home') }}">
                        <i class="material-icons undermenu-icon">search</i>
                    </a>
                @endif

                @if (route('hiyari.create') == url()->current())
                    <a class="col" href="{{ route('hiyari.create') }}">
                        <i class="material-icons undermenu-icon-clicked">edit</i>
                    </a>

                @else
                    <a class="col" href="{{ route('hiyari.create') }}">
                        <i class="material-icons undermenu-icon">edit</i>
                    </a>
                @endif

                @if (route('user.index') == url()->current())
                    <a class="col" href="{{ route('user.index') }}">
                        <i class="material-icons undermenu-icon-clicked">person</i>
                    </a>

                @else
                    <a class="col" href="{{ route('user.index') }}">
                        <i class="material-icons undermenu-icon">person</i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
