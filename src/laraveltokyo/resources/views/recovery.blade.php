@extends('layouts.app')
@section('title', '回収率計算ツール')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card col-lg-5 shadow">
            <div class="card-title mt-3">
                <h5 class="text-center">回収率計算ツール</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('recovery') }}" method="POST">
                    @csrf
                    <div class="mt-1">
                        <input type="number" placeholder="購入金額" class="form-control" name="purchase" step="100" min="100" max="100000000" />
                    </div>
                    <div class="mt-3">
                        <input type="number" placeholder="払戻金額" class="form-control" name="refund" step="10" min="0" max="1000000000" />
                    </div>
                    <div class="justify-content-center d-flex">
                        <button type="submit" class="btn btn-dark mb-2 mt-3">計算する</button>
                    </div>
                </form>
                <div class="m-3 ms-5">
                    <h5>回収率 : {{ $recovery_A ?? '' }}</h5>
                    <h5>回収率(%) : {{ $recovery_B  ?? ''}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="card col-lg-5 shadow">
            <h5 class="text-center m-3">回収率とは？</h5>
            <p>「回収率 = 払戻金額 ÷ 購入金額」で算出される回収できた割合のことです。回収率が100%より多いなら収支はプラス、100%より少ないなら収支はマイナス、100%ちょうどなら元返しです。</p>
        </div>
    </div>
</div>

@endsection
