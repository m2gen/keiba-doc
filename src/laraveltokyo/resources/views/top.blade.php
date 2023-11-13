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
                    <p class="lead fw-bold">地方から中央まで。その日の収支を細かく記録できる競馬専用収支アプリ。</p>
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
                            競馬ドックとは、地方から中央まで対応したシンプルで使いやすい競馬専用収支管理アプリです。日付、競馬場、購入金額、払戻金額、馬券の種類、メモまで細かく記録できます。入力されたデータから的中率や回収率、勝利数なども自動で算出されるため、あらゆるデータも一括管理可能です。
                        </dd>
                    </figcaption>
                </dl>
                <dl class="m-3 py-5 row justify-content-between">
                    <img class="object-fit-cover img-thumbnail col-md-5" src="https://i.imgur.com/hHGklC0.png" alt="オルフェーヴル">
                    <figcaption class="mt-5 text-md-end col-md-5">
                        <dt class="h1">収支記録を一覧で見れる</dt>
                        <dd class="lead">
                            過去の収支記録はすべて保存され、一覧で見やすくまとめられています。編集・削除も容易にできて簡単に一括管理可能です。
                        </dd>
                    </figcaption>
                </dl>
                <dl class="m-3 py-5 row justify-content-between">
                    <img class="object-fit-cover img-thumbnail col-md-5 order-md-2" src="https://i.imgur.com/hHGklC0.png" alt="オルフェーヴル">
                    <figcaption class="mt-5 col-md-5 order-md-1">
                        <dt class="h1">グラフで収支を確認</dt>
                        <dd class="lead">
                            過去18日分の購入金額と払戻金額の折れ線グラフを自動で作成します。
                        </dd>
                    </figcaption>
                </dl>
            </div>
        </figure>
    </section>
    @endsection
