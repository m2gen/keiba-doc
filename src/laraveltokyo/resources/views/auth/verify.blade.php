@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('メールアドレスを確認してください') }}</div>
                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('新しい確認リンクがあなたのメールアドレスに送信されました。') }}
                    </div>
                    @endif
                    {{ __('続行する前に、メールで確認リンクを確認してください。') }}
                    {{ __('メールを受け取らなかった場合') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('ここをクリックして別のリクエストを送信してください') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
