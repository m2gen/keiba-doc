@extends('layouts.app')

@section('content')

@push('style')
<style>
    .nav-pills .nav-link.active {
        background-color: #000;
        color: #fff;
        font-weight: bold;
    }

    .nav-pills .nav-link {
        color: #000;
    }

    .card {
        background-color: #E7F4E7;
    }
</style>
@endpush

<div class="container">
    <div class="row justify-content-md-center">

        <!-- 収益表示ページ -->
        <div class="card mt-5 col-lg-6 shadow text-center">
            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">合計</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">日別</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">週別</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">月別</button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            @include('total')
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            <h3 class="m-4">収支合計：いいい</h3>
                            <p>購入：</p>
                            <p>払戻：</p>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                            <h3 class="m-4">収支合計：ううう</h3>
                            <p>購入：</p>
                            <p>払戻：</p>
                        </div>
                        <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
                            <h3 class="m-4">収支合計：ええええ</h3>
                            <p>購入：</p>
                            <p>払戻：</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ route('list') }}" class="btn btn-dark mb-3">収支一覧を見る</a>
            </div>
        </div>

        <!-- 入力フォーム -->
        <div class="col-lg-4 mt-5 ms-lg-3 card shadow">
            <form action="{{ route('total') }}" method="POST" class="text-center">
                @csrf
                <div class="card-body">
                    <h4 class="mt-2">収支入力フォーム</h4>
                    <div class="mb-3">
                        <label for="date" class="form-label"></label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="mb-2">
                        <select class="form-select" name="horse_track" aria-label="Default select example">
                            <option selected>競馬場を選択</option>
                            <option value="東京競馬場">東京競馬場</option>
                            <option value="京都競馬場">京都競馬場</option>
                            <option value="阪神競馬場">阪神競馬場</option>
                            <option value="中山競馬場">中山競馬場</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="purchase" class="form-label">購入金額</label>
                        <input type="number" id="tentacles" class="form-control" name="purchase" step="100" min="100" max="10000000000" />
                    </div>
                    <div class="mb-2">
                        <label for="refund" class="form-label">払戻金額</label>
                        <input type="number" id="tentacles" class="form-control" name="refund" step="10" max="1000000000000" />
                    </div>
                    <div class="mb-2">
                        <label for="memo" class="form-label">メモ(任意)</label>
                        <textarea type="text" name="memo" class="form-control"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark mb-3">保存する</button>
            </form>
        </div>
    </div>
</div>
@endsection
