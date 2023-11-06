@extends('layouts.app')

@section('content')
@section('title', '競馬ドック | 一覧')

@push('style')
<style>
    .card {
        background-color: #FDFDDB;
    }
</style>
@endpush

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
                        <a href="/edit/{{ $post['id'] }}" class="text-white">編集</a>
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
