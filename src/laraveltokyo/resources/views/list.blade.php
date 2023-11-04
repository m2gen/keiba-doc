@extends('layouts.app')

@section('content')

@push('style')
<style>
    .card {
        background-color: #E7F4E7;
    }
</style>
@endpush

@foreach($posts as $post)

<div class="container card mt-3 shadow" id="list-card">
    <div class="card-body">

        <p>日付：{{ $post->date }}</p>
        <p>場所：{{ $post->horse_track }}</p>
        <p>購入金額：{{ number_format($post->purchase) }} 円</p>
        <p>払戻金額：{{ number_format($post->refund) }} 円</p>
        <p>メモ：{{ $post->memo }}</p>

    </div>
</div>

@endforeach
@endsection
