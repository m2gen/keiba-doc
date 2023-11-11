    @extends('layouts.app')

    @section('content')
    @push('style')
    <style>
        #bg-top-image {
            background-color: #fff;
            height: 400px;
        }

        #main-top-sec {
            padding: 30px;
            color: #000;
        }
    </style>
    @endpush

    <main>
        <div class="position-relative">
            <section id="bg-top-image" class="container-fluid">
                <div id="main-top-sec" class="container position-absolute top-50 start-50 translate-middle">
                    <h1 class="display-1 fw-bold opacity-100">競馬ドック</h1>
                    <p class="lead fw-bold">その日の収支を競馬場ごとに一括管理できるシンプルで使いやすい競馬専用収支アプリ</p>
                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                        <a href="{{ url('/home') }}"></a>
                        @else
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            <button type="submit" class="mt-5 btn btn-warning btn-lg">ログイン</button>
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-decoration-none">
                            <button type="submit" class="mt-5 ms-3 btn btn-dark btn-lg">新規登録</button>
                        </a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </section>
        </div>
    </main>

    <section class="bg-light">
        <figure class="figure container-fluid">
            <div class="container">
                <dl class="m-3 py-5 row justify-content-between">
                    <img class="object-fit-cover img-thumbnail col-md-5 order-md-2" src="https://i.imgur.com/hHGklC0.png" alt="オルフェーヴル">
                    <figcaption class="mt-5 col-md-5 order-md-1">
                        <dt class="h1">競馬ドックとは</dt>
                        <dd class="lead">
                            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                        </dd>
                    </figcaption>
                </dl>
                <dl class="m-3 py-5 row justify-content-between">
                    <img class="object-fit-cover img-thumbnail col-md-5" src="https://i.imgur.com/hHGklC0.png" alt="オルフェーヴル">
                    <figcaption class="mt-5 text-md-end col-md-5">
                        <dt class="h1">細かく記録できる</dt>
                        <dd class="lead">
                            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                        </dd>
                    </figcaption>
                </dl>
                <dl class="m-3 py-5 row justify-content-between">
                    <img class="object-fit-cover img-thumbnail col-md-5 order-md-2" src="https://i.imgur.com/hHGklC0.png" alt="オルフェーヴル">
                    <figcaption class="mt-5 col-md-5 order-md-1">
                        <dt class="h1">グラフで収支を確認</dt>
                        <dd class="lead">
                            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                        </dd>
                    </figcaption>
                </dl>
            </div>
        </figure>
    </section>
    @endsection
