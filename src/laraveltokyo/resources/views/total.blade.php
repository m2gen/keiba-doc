<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>競馬ドック</title>
</head>

<body>

    <div class="container">
        @if($totalNum > 0)
        <h3 class="mb-3 border-bottom border-black">収支総額：<span class="text-danger h1">+{{ number_format($totalNum) }}</span> 円</h3>
        @else
        <h3 class="mb-3 border-bottom border-black">収支総額：<span class="text-primary h1">{{ number_format($totalNum) }}</span> 円</h3>
        @endif

        <div class="row mt-4 justify-content-center">
            <p class="col-md-5 p-2 h5">購入: {{ number_format($PurchaseTotal) }} 円</p>
            <p class="col-md-5 p-2 h5">払戻: {{ number_format($RefundTotal) }} 円</p>
        </div>

        <ul class="text-start fs-6 m-2">
            <li class="col">回収率：{{ $recovery }} %</li>
            <li class="col">賭けた回数：{{ number_format($registerCount) }} 回</li>
            <li class="col">勝った回数：{{ number_format($winCount) }} 回</li>
            <li class="col">負けた回数：{{ number_format($defeatCount) }} 回</li>
            <li class="col">引き分け数：{{ number_format($sameCount) }} 回</li>
        </ul>
    </div>

</body>

</html>
