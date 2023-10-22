<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>競馬ドック</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ddbfae1daa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
</head>

<body>
    <!-- ヘッダー -->
    <header class="fixed-top">
        <div class="container-fluid bg-black">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand ms-3" href="#"><i class="fa-solid fa-horse-head" style="color: #fcfcfc;"></i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item ms-4">
                                <a class="nav-link fw-bold text-white" href="#">説明１</a>
                            </li>
                            <li class="nav-item ms-4">
                                <a class="nav-link fw-bold text-white" href="#">説明２</a>
                            </li>
                            <li class="nav-item ms-4">
                                <a class="nav-link fw-bold text-white" href="#">説明３</a>
                            </li>
                            <li class="nav-item ms-4">
                                <a class="nav-link fw-bold text-white" href="#">説明４</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        </div>
    </header>

    <!-- メイン -->
    <main>
        <div class="position-relative">
            <section id="bg-top-image" class="container-fluid" style="background-image: url(https://i.imgur.com/Mg1xBHn.png);">
                <div id="main-top-sec" class="container position-absolute top-50 start-50 translate-middle">
                    <h1 class="display-1 fw-bold opacity-100">競馬ドック</h1>
                    <p class="lead fw-bold">その日の収支を競馬場ごとに一括管理できるシンプルで使いやすい競馬収支アプリ</p>
                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                        <a href="{{ url('/form') }}"></a>
                        @else
                        <a href="{{ route('login') }}">
                            <button type="submit" class="mt-5 btn btn-primary btn-lg">ログイン</button>
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <button type="submit" class="mt-5 ms-3 btn btn-secondary btn-lg">新規登録</button>
                        </a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </section>
        </div>
    </main>

    <!-- セクション１ -->
    <section>
        <ul class="container list-unstyled">
            <li class="m-3 py-5 row">
                <img class="object-fit-cover border rounded col-md-6 order-md-2" src="https://i.imgur.com/hHGklC0.png" alt="オルフェーヴル">
                <div class="mt-5 col-md-6 order-md-1" id="top-section-li">
                    <h1>競馬ドックとは</h1>
                    <p>テキストテキストテキストテキストテキストテキスト<br />テキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
            </li>
            <li class="m-3 py-5 row">
                <img class="object-fit-cover border rounded col-md-6" src="https://i.imgur.com/hHGklC0.png" alt="オルフェーヴル">
                <div class="mt-5 text-md-end col-md-6" id="top-section-li">
                    <h1>細かく記録できる</h1>
                    <p>テキストテキストテキストテキストテキストテキスト<br />テキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
            </li>
            <li class="m-3 py-5 row">
                <img class="object-fit-cover border rounded col-md-6 order-md-2" src="https://i.imgur.com/hHGklC0.png" alt="オルフェーヴル">
                <div class="mt-5 col-md-6 order-md-1" id="top-section-li">
                    <h1>グラフで収支を確認</h1>
                    <p>テキストテキストテキストテキストテキストテキスト<br />テキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
            </li>
        </ul>
    </section>

    <!-- フッター -->
    <footer class="footer bg-black">
        <div class="container-fluid text-center text-white">
            <p class="mb-0">Copyright © 2023 競馬ドック</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
