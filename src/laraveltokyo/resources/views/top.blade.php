<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>競馬ドック</title>
    <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
</head>

<body>

    <!-- ヘッダー&フッター -->
    @extends('layouts.app')

    <!-- メイン -->
    @section('content')
    <main>
        <div class="position-relative">
            <section id="bg-top-image" class="container-fluid" style="background-image: url(https://i.imgur.com/JdNF3y0.png);">
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
                <div class="mt-5 col-md-6 order-md-1">
                    <h1>競馬ドックとは</h1>
                    <p>テキストテキストテキストテキストテキストテキスト<br />テキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
            </li>
            <li class="m-3 py-5 row">
                <img class="object-fit-cover border rounded col-md-6" src="https://i.imgur.com/hHGklC0.png" alt="オルフェーヴル">
                <div class="mt-5 text-md-end col-md-6">
                    <h1>細かく記録できる</h1>
                    <p>テキストテキストテキストテキストテキストテキスト<br />テキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
            </li>
            <li class="m-3 py-5 row">
                <img class="object-fit-cover border rounded col-md-6 order-md-2" src="https://i.imgur.com/hHGklC0.png" alt="オルフェーヴル">
                <div class="mt-5 col-md-6 order-md-1">
                    <h1>グラフで収支を確認</h1>
                    <p>テキストテキストテキストテキストテキストテキスト<br />テキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
            </li>
        </ul>
    </section>
    @endsection

</body>

</html>
