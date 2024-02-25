    @extends('layouts.app')
    @section('content')
    @section('title', '競馬ドック')

    @push('style')
    <style>
        #bg-top-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/背景画像候補１.jpg');
            background-size: cover;
            background-position: 50% 25%;
            height: 400px;
        }

        #main-top-sec {
            padding: 30px;
            color: #ffffff;
        }
    </style>
    @endpush
    {{-- 画像＆ログイン表示 --}}
    <main>
        <div class="position-relative" id="bg-top-image">
            <section class="container-fluid">
                <div id="main-top-sec" class="container position-absolute top-50 start-50 translate-middle">
                    <h1 class="display-1 fw-bold opacity-100">競馬ドック</h1>
                    <p class="lead fw-bold">地方から中央まで。その日の収支を細かく記録できる競馬専用収支アプリ。</p>
                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                        <a href="{{ url('/home') }}"></a>
                        @else
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            <button type="submit" class="mt-5 btn btn-dark border btn-lg">ログイン</button>
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-decoration-none">
                            <button type="submit" class="mt-5 ms-3 btn btn-dark border btn-lg">新規登録</button>
                        </a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </section>
        </div>
    </main>
    {{-- 詳細説明 --}}
    <section>
        <figure class="figure container-fluid">
            <div class="container">
                <dl class="m-3 py-5 row justify-content-between">
                    <figcaption class="mt-5 col-lg-5">
                        <dt class="h1 fw-bold border-bottom border-danger">競馬ドックとは</dt>
                        <dd class="fs-6 mt-3 fw-bold">
                            競馬ドックとは、地方から中央まで対応したシンプルで使いやすい競馬専用収支アプリです。webブラウザ専用で、メールアドレス、パスワードを設定すればすぐに始めることができます。日付、競馬場、購入金額、払戻金額、馬券の種類、メモまで細かく記録していきましょう。
                        </dd>
                    </figcaption>
                    <img class="mt-3 object-fit-cover shadow img-thumbnail col-lg-5" src="{{ asset('images/keiba32.png') }}" alt="競馬ドックとは">
                </dl>
                <dl class="m-3 py-5 row justify-content-between">
                    <figcaption class="mt-5 text-lg-end col-lg-5 order-lg-2">
                        <dt class="h1 fw-bold border-bottom border-success">収支記録を一覧で表示</dt>
                        <dd class="fs-6 mt-3 fw-bold">
                            過去の収支記録はすべて保存され、一覧で見やすくまとめられています。メモに残したレース名や買い目、競争馬のデータもここから確認可能。また編集・削除も容易にできて簡単に一括管理できます。
                        </dd>
                    </figcaption>
                    <img class="mt-3 object-fit-cover shadow col-lg-5 order-lg-1" src="{{ asset('images/keiba-list.png') }}" alt="リスト">
                </dl>
                <dl class="m-3 py-5 row justify-content-between">
                    <figcaption class=" mt-5 col-lg-5 order-lg-1">
                        <dt class="h1 fw-bold border-bottom border-info">グラフで収支を確認</dt>
                        <dd class="fs-6 mt-3 fw-bold">
                            過去14日分の購入金額と払戻金額の折れ線グラフを自動で作成します。あなたの賭け方の傾向、成功や失敗のパターンを視覚的に分析することで、パフォーマンスの改善に役立つでしょう。
                        </dd>
                    </figcaption>
                    <img class="mt-3 object-fit-cover shadow img-thumbnail col-lg-5 order-lg-2" src="{{ asset('images/keibaC.png') }}" alt="グラフ">
                </dl>
            </div>
        </figure>
    </section>
    @endsection
