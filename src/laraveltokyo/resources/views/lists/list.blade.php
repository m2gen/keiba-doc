@extends('layouts.app')

@section('title', '競馬ドック | リスト')

@section('content')

<!-- 更新アラート -->
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- 削除アラート -->
@if (session('del'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('del') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="container">
    <div class="row">
        <div class="col mt-4 text-start">
            <a href="{{ route('home') }}" class="btn btn-dark">←ホームに戻る</a>
        </div>

        <div class="col mt-4 dropdown text-end">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                新しい順
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{ route('lists.old') }}">古い順</a></li>
                <li><a class="dropdown-item" href="{{ route('lists.purchase') }}">購入金額降順</a></li>
                <li><a class="dropdown-item" href="{{ route('lists.refund') }}">払戻金額降順</a></li>
                <li><a class="dropdown-item" href="{{ route('lists.update') }}">更新順</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mx-1">
        @foreach($news as $new)
        <div class="container card mt-3 shadow col-md-5" id="list-card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="/edit/{{ $new['id'] }}" class="text-white text-decoration-none">
                        <button type="button" class="btn btn-sm btn-dark">編集/削除</button>
                    </a>
                </div>
                <h6>日付：{{ $new->date }}</h6>
                <h6>場所：{{ $new->horse_track }}</h6>
                <h6>購入金額：{{ number_format($new->purchase) }} 円</h6>
                <h6>払戻金額：{{ number_format($new->refund) }} 円</h6>
                @if($new->memo)
                <h6>メモ：{{ $new->memo }}</h6>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
