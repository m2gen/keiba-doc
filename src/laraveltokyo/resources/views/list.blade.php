@extends('layouts.app')

@section('content')
@section('title', '競馬ドック | リスト')

@push('style')
<style>
    .card {
        background-color: #FDFDDB;
    }
</style>
@endpush

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

<div class="container mt-4">
    <a href="{{ route('home') }}" class="btn btn-dark">←ホームに戻る</a>
</div>

<div class="container">
    <div class="row mx-1">
        @foreach($posts as $post)
        <div class="container card mt-3 shadow col-md-5" id="list-card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-sm btn-dark">
                        <a href="/edit/{{ $post['id'] }}" class="text-white text-decoration-none">編集/削除</a>
                    </button>
                </div>
                <h6 class="p-1">日付：{{ $post->date }}</h6>
                <h6 class="p-1">場所：{{ $post->horse_track }}</h6>
                <h6 class="p-1">購入金額：{{ number_format($post->purchase) }} 円</h6>
                <h6 class="p-1">払戻金額：{{ number_format($post->refund) }} 円</h6>
                <h6 class="p-1">メモ：{{ $post->memo }}</h6>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
