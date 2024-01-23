@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-body text-center">
            <h4 class="card-title">送信完了</h4>
            <p class="card-text">お問い合わせありがとうございます。メッセージは正常に送信されました。</p>
            <a href="{{ url('/') }}" class="btn btn-dark" id="main-button-color">トップに戻る</a>
        </div>
    </div>
</div>
@endsection
