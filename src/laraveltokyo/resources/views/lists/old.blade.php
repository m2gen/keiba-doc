@extends('layouts.app')

@section('title', '競馬ドック | 古い順')

@section('content')

<div class="container">
    <div class="row">
        <div class="col mt-4 text-start">
            <a href="{{ route('home') }}" class="btn btn-dark">←ホームに戻る</a>
        </div>

        <div class="col mt-4 dropdown text-end">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                古い順
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item active" href="{{ route('lists.list') }}">新しい順</a></li>
                <li><a class="dropdown-item" href="{{ route('lists.purchase') }}">購入金額降順</a></li>
                <li><a class="dropdown-item" href="{{ route('lists.refund') }}">払戻金額降順</a></li>
                <li><a class="dropdown-item" href="{{ route('lists.update') }}">更新順</a></li>
            </ul>
        </div>
    </div>
</div>


<div class="container">
    <div class="row mx-1">
        @foreach($olds as $old)
        <div class="container card mt-3 shadow col-md-5" id="list-card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="/edit/{{ $old['id'] }}" class="text-white text-decoration-none">
                        <button type="button" class="btn btn-sm btn-dark">編集/削除</button>
                    </a>
                </div>
                <h6>日付：{{ $old->date }}</h6>
                <h6>場所：{{ $old->horse_track }}</h6>
                <h6>購入金額：{{ number_format($old->purchase) }} 円</h6>
                <h6>払戻金額：{{ number_format($old->refund) }} 円</h6>
                @if($old->memo)
                <h6>メモ：{{ $old->memo }}</h6>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
