<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
    <title>@yield('title')</title>
    @else
    <title>{{ config('app.name', '競馬ドック') }}</title>
    @endif

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ddbfae1daa.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{ asset('images/競馬ドックicon.png') }}">

    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('style')

</head>

<body>
    <!-- ヘッダー -->
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: rgb(19, 100, 15);">
            <div class="container fw-bold">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    <img src="{{ asset('images/競馬ドックicon.png') }}" alt="Logo" width="45" height="45">
                    競馬ドック
                </a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="modal" data-bs-target="#navbarModal">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- モーダル -->
                <div class="modal fade" id="navbarModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">メニュー</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <ul class="navbar-nav">
                                    @guest
                                    @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="{{ route('login') }}">ログイン</a>
                                    </li>
                                    @endif
                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="{{ route('register') }}">新規登録</a>
                                    </li>
                                    @endif
                                    @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}"><i class="fa-sharp fa-solid fa-house me-2"></i>ホーム</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-sharp fa-solid fa-right-from-bracket me-2"></i>ログアウト</a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('login') }}">ログイン</a>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('register') }}">新規登録</a>
                        </li>
                        @endif
                        @else
                        <div class="dropdown">
                            <a id="navbarDropdown" class="nav-link text-light dropdown-toggle" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}"><i class="fa-sharp fa-solid fa-house me-2"></i>ホーム</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-sharp fa-solid fa-right-from-bracket me-2"></i>ログアウト</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div> @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- メインココンテンツ -->
    <main class="min-vh-100 pb-5">
        @yield('content')
    </main>

    <!-- フッター -->
    <footer class="mb-0" style="background-color: rgb(19, 100, 15);">
        <div class="container text-light">
            <div class="row">
                <div class="col-lg-6 py-5">
                    <p>X（Twitter）をフォローする</p>
                    <button type="button" class="btn btn-light w-25">
                        <a href="#" class="d-block" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                    </button>
                </div>
                <div class="col-lg-6 text-lg-end py-5">
                    <ul class="navbar-nav text-light">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">トップ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('recovery') }}">回収率計算ツール</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('term') }}">利用規約</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('policy') }}">プライバシーポリシー</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">お問い合わせ</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="text-center pb-1 pt-4">
                <p>Copyright © 2024 @競馬ドック</p>
            </div>
        </div>
    </footer>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
