@extends('layouts.app')

@section('title', '競馬ドック | 払戻金額降順')

@section('content')

<div class="container">
    <div class="row">
        <div class="col mt-4 text-start">
            <a href="{{ route('home') }}" class="btn btn-dark">←ホームに戻る</a>
        </div>

        <div class="col mt-4 dropdown text-end">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                払戻金額降順
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item active" href="{{ route('lists.list') }}">新しい順</a></li>
                <li><a class="dropdown-item" href="{{ route('lists.old') }}">古い順</a></li>
                <li><a class="dropdown-item" href="{{ route('lists.purchase') }}">購入金額降順</a></li>
                <li><a class="dropdown-item" href="{{ route('lists.update') }}">更新順</a></li>
            </ul>
        </div>
    </div>
</div>


<div class="container mb-5">
    <div class="row mx-1">
        @foreach($maxRefunds as $maxRefund)
        <div class="container card mt-3 shadow col-md-5" id="list-card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="/edit/{{ $maxRefund['id'] }}" class="text-white text-decoration-none">
                        <button type="button" class="btn btn-sm btn-dark">編集/削除</button>
                    </a>
                </div>
                <h6>日付：{{ $maxRefund->date }}</h6>
                <h6>場所：{{ $maxRefund->horse_track }}</h6>
                <h6>購入金額：{{ number_format($maxRefund->purchase) }} 円</h6>
                <h6 class="fw-bold">払戻金額：{{ number_format($maxRefund->refund) }} 円</h6>
                <h6>馬券の種類：{{ $maxRefund->types }}</h6>
                @if($maxRefund->memo)
                <h6>メモ：{{ $maxRefund->memo }}</h6>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
