@extends('layouts.app')

@section('title', '競馬ドック | 更新順')

@section('content')

<div class="container">
    <div class="row">
        <div class="col mt-4 text-start">
            <a href="{{ route('home') }}" class="btn btn-dark">←ホームに戻る</a>
        </div>

        <div class="col mt-4 dropdown text-end">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                更新順
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item active" href="{{ route('lists.list') }}">新しい順</a></li>
                <li><a class="dropdown-item" href="{{ route('lists.old') }}">古い順</a></li>
                <li><a class="dropdown-item" href="{{ route('lists.purchase') }}">購入金額降順</a></li>
                <li><a class="dropdown-item" href="{{ route('lists.refund') }}">払戻金額降順</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row mx-1">
        @foreach($updates as $update)
        <div class="container card mt-3 shadow col-md-5" id="list-card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <!-- ボタンをクリックするとモーダルが表示 -->
                    <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#modal{{ $update['id'] }}">編集/削除</button>
                </div>
                <h6>日付：{{ $update->date }}</h6>
                <h6>場所：{{ $update->horse_track }}</h6>
                <h6>購入金額：{{ number_format($update->purchase) }} 円</h6>
                <h6>払戻金額：{{ number_format($update->refund) }} 円</h6>
                <h6>馬券の種類：{{ $update->types }}</h6>
                <div class="d-flex">
                    <h6>メモ：</h6>
                    <h6>{!! nl2br(e($update->memo)) !!}</h6>
                </div>
            </div>
        </div>

        <!-- モーダル -->
        <div class="modal fade" id="modal{{ $update['id'] }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">操作を選択</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <form action="{{ route('delete', ['id' => $update['id']]) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger w-50">削除する</button>
                        </form>
                        <a href="/edit/{{ $update['id'] }}" class="btn btn-dark mt-4 w-50">編集する</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="mt-5">
            {{ $updates->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>

@endsection
